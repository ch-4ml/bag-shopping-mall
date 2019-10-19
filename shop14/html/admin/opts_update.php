<?
	include "../common.php";
	
	$name = $_REQUEST[name];
	$no1 = $_REQUEST[no1];
	$query="update opts14 set opt_no14='$no1',name14='$name', price14='$price' where no14=$no2;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 : $query");
?>

<script>location.href="opts.php?no1=<?=$no1?>"</script>