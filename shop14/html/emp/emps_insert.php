<?
	include "../common.php";

	$name=$_REQUEST[name];
	$emp_no=$_REQUEST[emp_no];
	$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	$query="insert into emps14 (emp_no14, name14, birthday14) values ('$no1', '$name', '$birthday');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>
<script>location.href="emps.php?no1=<?=$no1?>"</script>