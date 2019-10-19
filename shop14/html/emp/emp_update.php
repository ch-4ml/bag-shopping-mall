<?
	include "../common.php";
	
	$name = $_REQUEST[name];
	$tel=sprintf("%-3s%-4s%-4s",$tel1, $tel2, $tel3);

	$query="update emp14 set name14='$name', tel14='$tel' where no14=$no1;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 : $query");
?>

<script>location.href="emp.php"</script>