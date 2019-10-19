<?
	include "../common.php";
	
	$query="delete from emps14 where no14=$no2;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 : $query");
?>

<script>location.href="emps.php?no1=<?=$no1?>"</script>