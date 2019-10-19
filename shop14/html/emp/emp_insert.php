<?
	include "../common.php";

	$name=$_REQUEST[name];
	$tel=sprintf("%-3s%-4s%-4s",$tel1, $tel2, $tel3);
	$query="insert into emp14 (name14, tel14) values ('$name', '$tel');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("에러 : $query");
?>

<script>location.href="emp.php"</script>