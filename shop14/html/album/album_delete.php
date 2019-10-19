<?
	include "../common.php";

	$query="delete from album14 where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>
<script>location.href="album.php"</script>