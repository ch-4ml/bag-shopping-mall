<?
	include "../common.php";
?>
<html>
<head>
	<title>주소록 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>

<body>
<?
	$query="select * from emp14 where no14=$no1;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);

	$tel1=trim(substr($row[tel14],0,3));
	$tel2=trim(substr($row[tel14],3,4));
	$tel3=trim(substr($row[tel14],7,4));

?>
<form name="form1" method="post" action="emp_update.php">

<input type="hidden" name="no1" value="<?=$no1?>">

<table width="500" border="1" cellpadding="2" bgcolor="lightyellow" style="border-collapse:collapse">
  <tr>
    <td width="100" align="center" bgcolor="lightblue">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name14]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">전화</td>
    <td width="400" align="left">
      <input type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1?>"> -
      <input type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2?>"> -
      <input type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3?>">
    </td>
  </tr>
</table>
<br>
<table width="500" border="0">
  <tr>
    <td align="center"> 
		<input type="submit" value="수정"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>