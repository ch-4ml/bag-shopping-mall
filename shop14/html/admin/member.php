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
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<?
		if(!$text1)
			$query="select * from member14 order by name14;";
		else if($sel1==0)
			$query="select * from member14 where name14 like '%$text1%' order by name14;";
		else
			$query="select * from member14 where uid14 like '%$text1%' order by name14;";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러 : $query");
		$count=mysqli_num_rows($result); // 전체 레코드 개수
	
		if(!$page) $page=1;
		$pages=ceil($count/$page_line); // 전체 페이지 수
	
		$first=1;
		if($count>0) $first=$page_line*($page-1);
	
		$page_last = $count-$first;
		if($page_last>$page_line) $page_last=$page_line;
	
		if($count>0) mysqli_data_seek($result, $first);
?>
<table width="800" border="0">
	<form name="form1" method="post" action="member.php">
	<tr height="40">
		<td width="200" valign="bottom">&nbsp 회원수 : <font color="#FF0000"><?=$count?></font></td>
		<td width="540" align="right" valign="bottom">
			<?
				echo("<select name='sel1' class='font9'>");
				if(!$sel1) $sel1=0; 
				for($i=0; $i<$n_idname; $i++)
				{
					if($sel1==$i)
						echo("<option value='$i' selected>$a_idname[$i]</option>");
					else
						echo("<option value='$i'>$a_idname[$i]</option>");
				}				
				echo("</select>");
			?>
			<input type="text" name="text1" size="15" value="<?=$text1?>" class="font9">&nbsp
		</td>
		<td width="60" valign="bottom">
			<input type="button" value="검색" onclick="javascript:form1.submit();">&nbsp
		</td>
	</tr>
	</form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="100" align="center">ID</td>
		<td width="100" align="center">이름</td>
		<td width="100" align="center">전화</td>
		<td width="100" align="center">핸드폰</td>
		<td width="200" align="center">E-Mail</td>
		<td width="100" align="center">회원구분</td>
		<td width="100" align="center">수정 / 삭제</td>
	</tr>
	<?
		for($i=0; $i<$page_last; $i++)
		{
			$row=mysqli_fetch_array($result);
			$tel1=trim(substr($row[tel14],0,3));
			$tel2=trim(substr($row[tel14],3,4));
			$tel3=trim(substr($row[tel14],7,4));
			$tel=sprintf("%3s-%4s-%4s",$tel1, $tel2, $tel3);
			$phone1=substr($row[phone14],0,3);
			$phone2=substr($row[phone14],3,4);
			$phone3=substr($row[phone14],7,4);
			$phone=sprintf("%3s-%4s-%4s", $phone1, $phone2, $phone3);
			if($row[gubun14]==0) 
				$gubun="회원";
			else
				$gubun="탈퇴";
			echo("<tr bgcolor='#F2F2F2' height='23'>	
				<td width='100'>&nbsp $row[uid14]</td>	
				<td width='100'>&nbsp $row[name14]</td>	
				<td width='100'>&nbsp $tel</td>	
				<td width='100'>&nbsp $phone</td>	
				<td width='200'>&nbsp $row[email14]</td>	
				<td width='100' align='center'>$gubun</td>	
				<td width='100' align='center'>
					<a href='member_edit.php?no=$row[no14]&page=$page&sel1=$sel1&text1=$text1'>수정</a> / <a href='member_delete.php?no=$row[no14]&page=$page&sel1=$sel1&text1=$text1'onclick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
				</td>
			</tr>");
		}
	?>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td height='40' align='center'>
		<?
			$blocks = ceil($pages/$page_block); // 전체 블록 수 = 전체 페이지 / 블록 당 페이지 수
			$block = ceil($page/$page_block); // 현재 블록 = 현재 페이지 / 블록당 페이지 수
			$page_s = $page_block*($block-1); // 표시해야 할 시작 페이지 번호 - 1 값
			$page_e = $page_block*$block; // 표시해야 할 마지막 페이지 번호
			if($blocks <= $block) $page_e = $pages;
			if($block>1)
			{
				$prev = $page_s;
				echo("<a href='member.php?page=$prev&text1=$text1&sel1=$sel1'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'></a> &nbsp;");
			}
			for($i=$page_s+1; $i<=$page_e; $i++)
			{
				if($i==$page)echo("[<font color='red'><b>$i</b></font>]");
				else echo("<a href='member.php?page=$i&text1=$text1&sel1=$sel1'>[$i]</a>");
				
			}
			if($block<$blocks)
			{
				$next = $page_e+1;
				echo("<a href='member.php?page=$next&text1=$text1&sel1=$sel1'>
				<img src='images/i_next.gif' align='absmiddle' border='0'></a>");
			}
		?>
		</td>
	</tr>
</table>

</center>

</body>
</html>