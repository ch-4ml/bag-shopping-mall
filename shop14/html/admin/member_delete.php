<?
	include "../common.php";
	$query="delete from member14 where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
?>
<script>location.href="member.php"</script>