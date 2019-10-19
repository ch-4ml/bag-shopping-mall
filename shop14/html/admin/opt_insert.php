<?
	include "../common.php";

	$name=$_REQUEST[name];
	$query="insert into opt14 (name14) values ('$name');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("에러 : $query");
?>

<script>location.href="opt.php"</script>