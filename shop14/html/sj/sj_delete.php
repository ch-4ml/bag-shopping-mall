<?
	include "common.php";

	$query="delete from sj14 where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("��������");
?>

<script>location.href="sj_list.php"</script>