<?
	include "../common.php";
	
	$query="delete from emp14 where no14=$no1;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
?>

<script>location.href="emp.php"</script>