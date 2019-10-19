<?
	include "../common.php";
?>

<html>
<head>
	<title>직원 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>
<body>

<?
	$query="select * from emp14 where no14=$no1;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row1=mysqli_fetch_array($result);
?>

<input type="hidden" name="no1" value="<?=$no1?>">

<table width="500" border="0">
	<tr>
		<td align="left"  width="300" valign="bottom">
			직원이름 : <b><?=$row1[name14]?></b>
		</td>
		<td align="right" width="200" valign="bottom">
			<a href="emps_new.php?no1=<?=$no1?>">신규입력</a>
		</td>
	</tr>
</table>

<?
	$query="select * from emps14 where emp_no14=$no1 order by no14;";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러 : $query");
	$count=mysqli_num_rows($result);
?>

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">가족이름</td>
    <td width="100" align="center">기족생일</td>
    <td width="100" align="center">수정 / 삭제</td>
  </tr>

<?
	for($i=0; $i<$count; $i++) {
		$row=mysqli_fetch_array($result);
		$birthday1=substr($row[birthday14],0,4);
		$birthday2=substr($row[birthday14],5,2);
		$birthday3=substr($row[birthday14],8,2);
		$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

		echo("<tr bgcolor='lightyellow'>
			<td width='100' align='center'>$row[name14]</td>
			<td width='100' align='center'>$birthday</td>
			<td width='100' align='center'>
				<a href='emps_edit.php?no1=$no1&no2=$row[no14]'>수정</a> / 
				<a href='emps_delete.php?no1=$no1&no2=$row[no14]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
			</td>
		 </tr>");
}
?>
</table>
<table width="500" cellpadding="2">
	<tr><td align="center"><a href="emp.php">직원화면으로 돌아가기</a></td></tr>
</table>

</body>
</html>
