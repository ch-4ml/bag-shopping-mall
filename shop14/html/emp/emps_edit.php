<?
	include "../common.php";
	
	$query="select * from emps14 where no14=$no2;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);

	$birthday1=substr($row[birthday14],0,4);
	$birthday2=substr($row[birthday14],5,2);
	$birthday3=substr($row[birthday14],8,2);
?>
<html>
<head>
	<title>직원 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>

<body>

<form name="form1" method="post" action="emps_update.php">

<input type="hidden" name="no1" value="<?=$no1?>">
<input type="hidden" name="no2" value="<?=$no2?>">

<table width="500" border="1" cellpadding="2" bgcolor="lightyellow" style="border-collapse:collapse">
  <tr>
    <td width="100" align="center" bgcolor="lightblue">가족이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name14]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">생일</td>
    <td width="400" align="left">
      <input type="text" name="birthday1" size="4" maxlength="4" value="<?=$birthday1?>"> -
      <input type="text" name="birthday2" size="2" maxlength="2" value="<?=$birthday2?>"> -
      <input type="text" name="birthday3" size="2" maxlength="2" value="<?=$birthday3?>"> 
    </td>
  </tr>
</table>
<br>
<table width="500" border="0">
  <tr>
    <td align="center"> 
	  <input type="submit" value="저장"> &nbsp
	  <input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>