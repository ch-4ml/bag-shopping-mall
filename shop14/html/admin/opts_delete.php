<?
	include "../common.php";
	
	$query="delete from opts14 where no14=$no2;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 : $query");
?>

<script>location.href="opts.php?no1=<?=$no1?>"</script>