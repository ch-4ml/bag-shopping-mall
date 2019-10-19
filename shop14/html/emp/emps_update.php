<?
	include "../common.php";
	
	$name = $_REQUEST[name];
	$no1 = $_REQUEST[no1];
	$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	$query="update emps14 set emp_no14='$no1',name14='$name', birthday14='$birthday' where no14=$no2;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 : $query");
?>

<script>location.href="emps.php?no1=<?=$no1?>"</script>