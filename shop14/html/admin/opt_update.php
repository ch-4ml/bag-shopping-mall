<?
	include "../common.php";
	
	$name = $_REQUEST[name];
	$query="update opt14 set name14='$name' where no14=$no1;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 : $query");
?>

<script>location.href="opt.php"</script>