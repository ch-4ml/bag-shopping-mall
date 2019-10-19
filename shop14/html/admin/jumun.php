<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_update(no,pos)
	{
		state=form1.state[pos].value;
		location.href="jumun_update.php?no="+no+"&state="+state+"&page="+form1.page.value+
			"&sel1="+form1.sel1.value+"&sel2="+form1.sel2.value+"&text1="+form1.text1.value+
			"&day1_y="+form1.day1_y.value+"&day1_m="+form1.day1_m.value+"&day1_d="+form1.day1_d.value+
			"&day2_y="+form1.day2_y.value+"&day2_m="+form1.day2_m.value+"&day2_d="+form1.day2_d.value;
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<form name="form1" method="post" action="jumun.php">
<input type="hidden" name="page" value="<?=$page?>">

<?
	if(!$day1_y) $day1_y=2017;
	if(!$day1_m) {
		$d1_m=1;
		$day1_m=sprintf("%02d", $d1_m);
	}
	if(!$day1_d) {
		$d1_d=1;
		$day1_d=sprintf("%02d", $d1_d);
	}
	$start_date=date("Y-m-d", strtotime($day1_y.$day1_m.$day1_d));
	if(!$day2_y) $day2_y=2017;
	if(!$day2_m) {
		$d2_m=12;
		$day2_m=sprintf("%02d", $d2_m);
	}
	if(!$day2_d) {
		$d2_d=31;
		$day2_d=sprintf("%02d", $d2_d);
	}
	$end_date=date("Y-m-d", strtotime($day2_y.$day2_m.$day2_d));
	if(!$sel1) $sel1=0;
	if(!$sel2) $sel2=0;
	if(!$text1) $text1="";

	$k=0;
	$s[$k]="jumunday14 between '".$start_date."' and '".$end_date."'";			$k++;					

	if($sel1 != 0)			{$s[$k] = "status14=".$sel1;						$k++;}
	if($text1) {
		if($sel2==1)		{$s[$k] = "no14 like '%".$text1."%'";				$k++;}
		else if($sel2==2)	{$s[$k] = "o_name14 like '%".$text1."%'";			$k++;}
		else if($sel2==3)	{$s[$k] = "product_names14 like '%".$text1."%'";	$k++;}
	}
	if($k>0) {
		$tmp=implode(" and ", $s);
		$tmp=" where ".$tmp;
	}
	$query="select * from jumun14 ".$tmp." order by no14";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$count=mysqli_num_rows($result);

	if(!$page) $page=1;
	$pages=ceil($count/$page_line); // 전체 페이지 수
	
	$first=1;
	if($count>0) $first=$page_line*($page-1);
	
	$page_last=$count-$first;
	if($page_last>$page_line) $page_last=$page_line;
	
	if($count>0) mysqli_data_seek($result, $first);
?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
	<tr height="40">
		<td align="left"  width="70" valign="bottom">&nbsp 주문수 : <font color="#FF0000">20</font></td>
		<td align="right" width="730" valign="bottom">
			기간 : 
			<input type="text" name="day1_y" size="4" value="<?=$day1_y?>">
			<select name="day1_m">
			<?
				for($m=1;$m<=12;$m++) {
					$fm=sprintf("%02d", $m);
					if($fm==$day1_m)
						echo("<option value='$fm' selected>$m</option>");
					else
						echo("<option value='$fm'>$m</option>");
				}
			?>
			</select>
			<select name="day1_d">
			<?
				for($d=1;$d<=31;$d++) {
					$fd=sprintf("%02d", $d);
					if($fd==$day1_d)
						echo("<option value='$fd' selected>$d</option>");
					else
						echo("<option value='$fd'>$d</option>");
				}
			?>
			</select> - 
			<input type="text" name="day2_y" size="4" value="<?=$day2_y?>">
			<select name="day2_m">
			<?
				for($m=1;$m<=12;$m++) {
					$fm=sprintf("%02d", $m);
					if($fm==$day2_m)
						echo("<option value='$fm' selected>$m</option>");
					else
						echo("<option value='$fm'>$m</option>");
				}
			?>
			</select>
			<select name="day2_d">
			<?
				for($d=1;$d<=31;$d++) {
					$fd=sprintf("%02d", $d);
					if($fd==$day2_d)
						echo("<option value='$fd' selected>$d</option>");
					else
						echo("<option value='$fd'>$d</option>");
				}
			?>
			</select> &nbsp
			<select name="sel1">
			<?
				for($i=0; $i<$n_state;$i++) {
					if($i==$sel1)
						echo("<option value='$i' selected>$a_state[$i]</option>");
					else
						echo("<option value='$i'>$a_state[$i]</option>");
				}
			?>
			</select> &nbsp 
			<select name="sel2">
			<?
				for($i=1; $i<$n_search; $i++) {
					if($i==$sel2)
						echo("<option value='$i' selected>$a_search[$i]</option>");
					else
						echo("<option value='$i'>$a_search[$i]</option>");
				}
			?>
			</select>
			<input type="text" name="text1" size="10" value="<?=$text1?>">&nbsp
			<input type="button" value="검색" onclick="javascript:form1.submit();"> &nbsp;
		</td>
	</tr>
	</tr><td height="5" colspan="2"></td></tr>
</table>

<table width="840" border="1" cellpadding="0" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="70"  align="center">주문번호</td>
		<td width="70"  align="center">주문일</td>
		<td width="290" align="center">상품명</td>
		<td width="50"  align="center">제품수</td>	
		<td width="70"  align="center">총금액</td>
	    <td width="65"  align="center">주문자</td>
		<td width="50"  align="center">결재</td>
		<td width="135" align="center" colspan="2">주문상태</td>
	    <td width="50"  align="center">삭제</td>
	</tr>
<?
	for($i=0; $i<$page_last; $i++) {
		$row=mysqli_fetch_array($result);
		if($row[pay_method14] == 0)
			$pay_method="카드";
		else
			$pay_method="무통장";
		$state=$row[state14];
		$f_total_cash=number_format($row[total_cash14]);
		echo("<tr bgcolor='#F2F2F2' height='23'> 
		<td width='70'  align='center'><a href='jumun_info.php?no=$row[no14]'>$row[no14]</a></td>
		<td width='70'  align='center'>$row[jumunday14]</td>
		<td width='290' align='left'>&nbsp;$row[product_names14]</td>	
		<td width='40' align='center'>$row[product_nums14]</td>	
		<td width='70'  align='right'>$f_total_cash&nbsp</td>	
		<td width='65'  align='center'>$row[o_name14]</td>	
		<td width='50'  align='center'>$pay_method</td>	
		<td width='85' align='center' valign='bottom'>");
		$color="black";
		if($state==5) $color="blue";
		if($state==6) $color="red";
		echo("<select name='state' style='font-size:9pt; color:$color'>");
			for($j=1; $j<$n_state;$j++) {
				if($j==$state)
					echo("<option value='$j' selected>$a_state[$j]</option>");
				else
					echo("<option value='$j'>$a_state[$j]</option>");
			}
		echo("</select>&nbsp
		</td>
		<td width='50' align='center'>
			<a href='javascript:go_update(\"$row[no14]\", $i);'><img src='images/b_edit1.gif' border='0'></a>
		</td>	
		<td width='50' align='center'>
			<a href='jumun_delete.php?no=$row[no14]&page=$i&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d' onclick='javascript:return confirm(\"삭제할까요?\");'><img src='images/b_delete1.gif' border='0'></a>
		</td>
	</tr>");
	}
?>
</table>

<input type="hidden" name="state">

<table border="0" cellpadding="0" cellspacing="0" width="840">
	<tr>
		<td height="30" align="center" class="cmfont">
		<?
			$blocks = ceil($pages/$page_block); // 전체 블록 수 = 전체 페이지 / 블록 당 페이지 수
			$block = ceil($page/$page_block); // 현재 블록 = 현재 페이지 / 블록당 페이지 수
			$page_s = $page_block*($block-1); // 표시해야 할 시작 페이지 번호 - 1 값
			$page_e = $page_block*$block; // 표시해야 할 마지막 페이지 번호
			if($blocks <= $block) $page_e = $pages;
			if($block>1)
			{
				$prev = $page_s;
				echo("<a href='jumun.php?page=$prev&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'><font color='#7C7A77'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'></a> &nbsp;");
			}
			for($i=$page_s+1; $i<=$page_e; $i++)
			{
				if($i==$page)echo("[<font color='red'><b>$i</b></font>]");
				else echo("<a href='jumun.php?page=$i&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'>[$i]</a>");
				
			}
			if($block<$blocks)
			{
				$next = $page_e+1;
				echo("<a href='jumun.php?page=$next&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'>
				<img src='images/i_next.gif' align='absmiddle' border='0'></a>");
			}
		?>
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>