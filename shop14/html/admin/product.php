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
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="product_new.php";
	}
</script>
</head>

<body style="margin:0">
<?
		if(!$sel1) $sel1=0;
		if(!$sel2) $sel2=0;
		if(!$sel3) $sel3=0;
		if(!$sel4) $sel4=0;
		if(!$text1) $text1="";

		$k=0;
		if($sel1 != 0)	  { $s[$k] = "status14=".$sel1;			$k++; }
		if($sel2 == 1)	  { $s[$k] = "icon_new14=1";			$k++; }
		else if($sel2 == 2) { $s[$k] = "icon_hit14=1";			$k++; }
		else if($sel2 == 3) { $s[$k] = "icon_sale14=1";			$k++; }
		if($sel3 != 0)	  { $s[$k] = "menu14=".$sel3;			$k++; }
		if($text1) {
			if($sel4 == 1)	  { $s[$k] = "name14 like '%".$text1."%'"; $k++; }
			else if($sel4 == 2) { $s[$k] = "code14 like '%".$text1."%'"; $k++; }
		}

		if($k>0) {
			$tmp=implode(" and ", $s);
			$tmp=" where ".$tmp;
		}
	
		$query="select * from product14 ".$tmp." order by name14";

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
<center>

<br>
<script> document.write(menu());</script>

<table width="800" border="0" cellspacing="0" cellpadding="0">
	<form name="form1" method="post" action="product.php">
	<tr height="40">
		<td align="left"  width="150" valign="bottom">&nbsp 제품수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="550" valign="bottom">
			<?
				echo("<select name='sel1' class='font9'>");
				if(!$sel1) $sel1=0; 
				for($i=0; $i<$n_status; $i++)
				{
					if($sel1==$i)
						echo("<option value='$i' selected>$a_status[$i]</option>");
					else
						echo("<option value='$i'>$a_status[$i]</option>");
				}				
				echo("</select>");
			?> &nbsp 
			<?
				echo("<select name='sel2' class='font9'>");
				if(!$sel2) $sel2=0; 
				for($i=0; $i<$n_icon; $i++)
				{
					if($sel2==$i)
						echo("<option value='$i' selected>$a_icon[$i]</option>");
					else
						echo("<option value='$i'>$a_icon[$i]</option>");
				}				
				echo("</select>");
			?> &nbsp 
			<?
				echo("<select name='sel3' class='font9'>");
				if(!$sel3) $sel3=0; 
				for($i=0; $i<$n_menu; $i++)
				{
					if($sel3==$i)
						echo("<option value='$i' selected>$a_menu[$i]</option>");
					else
						echo("<option value='$i'>$a_menu[$i]</option>");
				}				
				echo("</select>");
			?> &nbsp 
			<?
				echo("<select name='sel4' class='font9'>");
				if(!$sel4) $sel4=1; 
				for($i=1; $i<$n_pnamecode; $i++)
				{
					if($sel4==$i)
						echo("<option value='$i' selected>$a_pnamecode[$i]</option>");
					else
						echo("<option value='$i'>$a_pnamecode[$i]</option>");
				}				
				echo("</select>");
			?> &nbsp
			<input type="text" name="text1" size="10" value="<?=$text1?>"> &nbsp
		</td>
		<td align="left" width="120" valign="bottom">
			<input type="button" value="검색" onclick="javascript:form1.submit();"> &nbsp;&nbsp
			<input type="button" value="입력" onclick="javascript:go_new();">
		</td>
	</tr>
	<tr><td height="5"></td></tr>
	</form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="100" align="center">제품분류</td>
		<td width="100" align="center">제품코드</td>
		<td width="280" align="center">제품명</td>
		<td width="70"  align="center">판매가</td>
		<td width="50"  align="center">상태</td>
		<td width="120" align="center">이벤트</td>
		<td width="80"  align="center">수정 / 삭제</td>
	</tr>
	<?
			if($count!=0) {
				for($i=0; $i<$page_last; $i++) {
					$event="";
					$row=mysqli_fetch_array($result);
					$f_price=number_format($row[price14]);
					$name_strip = stripslashes($row[name14]);
					$menu_index = $row[menu14];
					$status_index = $row[status14];
					if($row[icon_new14]==1) $event=$event." New";
					if($row[icon_hit14]==1) $event=$event." Hit";
					if($row[icon_sale14]==1) $event=$event." Sale(".$row[discount14]."%)";
					$event = $event." ";
					echo("<tr bgcolor='#F2F2F2' height='23'>	
						<td width='100'>&nbsp $a_menu[$menu_index]</td>
						<td width='100'>&nbsp $row[code14]</td>
						<td width='280'>&nbsp $name_strip</td>	
						<td width='70'  align='right'>$f_price &nbsp</td>	
						<td width='50'  align='center'>$a_status[$status_index]</td>	
						<td width='120' align='center'>&nbsp $event</td>	
						<td	width='80'  align='center'>
							<a href='product_edit.php?no=$row[no14]&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'>수정		</a>/
							<a href='product_delete.php?no=$row[no14]&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page' onclick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
						</td>
					</tr>");
				}
			}
	?>
</table>

<table width="800" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" class="cmfont" align="center">
		<?
			$blocks = ceil($pages/$page_block); // 전체 블록 수 = 전체 페이지 / 블록 당 페이지 수
			$block = ceil($page/$page_block); // 현재 블록 = 현재 페이지 / 블록당 페이지 수
			$page_s = $page_block*($block-1); // 표시해야 할 시작 페이지 번호 - 1 값
			$page_e = $page_block*$block; // 표시해야 할 마지막 페이지 번호
			if($blocks <= $block) $page_e = $pages;
			if($block>1)
			{
				$prev = $page_s;
				echo("<a href='product.php?page=$prev&text1=$text1&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'></a> &nbsp;");
			}
			for($i=$page_s+1; $i<=$page_e; $i++)
			{
				if($i==$page)echo("[<font color='red'><b>$i</b></font>]");
				else echo("<a href='product.php?page=$i&text1=$text1&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4'>[$i]</a>");
				
			}
			if($block<$blocks)
			{
				$next = $page_e+1;
				echo("<a href='product.php?page=$next&text1=$text1&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4'>
				<img src='images/i_next.gif' align='absmiddle' border='0'></a>");
			}
		?>
		</td>
	</tr>
</table>

</center>

</body>
</html>