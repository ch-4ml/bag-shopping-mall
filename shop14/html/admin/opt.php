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
	function go_new()
	{
		location.href="opt_new.php";
	}
</script>
</head>

<body style="margin:0">
<?
	$query="select * from opt14 order by no14;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("에러 : $query");
	$count=mysqli_num_rows($result);
?>
<center>
<br>
<script> document.write(menu());</script>

<table width="500" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left"  width="250" height="50" valign="bottom">&nbsp 옵션수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="250" height="50" valign="bottom">
			<input type="button" value="신규입력" onclick="javascript:go_new();"> &nbsp
		</td>
	</tr>
	<tr><td height="5" colspan="2"></td></tr>
</table>

<table width="500" border="1" cellpadding="2"  style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="20"> 
		<td width="50"  align="center"><font color="#142712">번호</font></td>
		<td width="250" align="center"><font color="#142712">옵션명</font></td>
		<td width="100" align="center"><font color="#142712">수정 / 삭제</font></td>
		<td width="100" align="center"><font color="#142712">소옵션편집</font></td>
	</tr>
<?
	for($i=0; $i<$count; $i++) {
		$row=mysqli_fetch_array($result);
		echo("<tr bgcolor='#F2F2F2' height='20'>	
			<td width='50'  align='center'>$row[no14]</td>
			<td width='250' align='left'>$row[name14]</td>
			<td width='100' align='center'>
				<a href='opt_edit.php?no1=$row[no14]'>수정</a> /
				<a href='opt_delete.php?no1=$row[no14]' onclick='javascript:return confirm('삭제할까요 ?');'>삭제</a>
			</td>
			<td width='100' align='center'><a href='opts.php?no1=$row[no14]'>소옵션편집</a></td>
		</tr>");
	}
?>
</table>

<br>
</center>

</body>
</html>