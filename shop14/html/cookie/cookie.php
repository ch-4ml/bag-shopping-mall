<?
	$n_data=$_COOKIE[n_data];
	$data=$_COOKIE[data];
?>
<html>
<head>
	<title>쿠키 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="500" border="0">
	<form name="form1" method="post" action="cookie.php">
	<tr>
		<td align="right"><a href="cookie_new.php">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="500" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">쿠키번호</td>
    <td width="200" align="center">제품명</td>
    <td width="100" align="center">수량</td>
    <td width="100" align="center">수정/삭제</td>
  </tr>
	<?
		for($i=1;$i<=$n_data;$i++) {
			if($data[$i]) {
				list($no, $name, $num) = explode("^^", $data[$i]);
			echo("<tr>
    <td width='100' align='center'>$no</td>
    <td width='200' align='center'>$name</td>
    <td width='100' align='center'>$num</td>
    <td width='100' align='center'>
		<a href='cookie_edit.php?no=$no'>수정</a> / 
		<a href='cookie_delete.php?no=$no' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
	</td>
  </tr>");
		}
}
	?>

</table>

</body>
</html>
