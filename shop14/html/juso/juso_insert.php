<?
	include "common.php";
	
	$name=$_REQUEST[name];
	$tel=sprintf("%-3s%-4s%-4s",$tel1, $tel2, $tel3);
	$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
	$birthday=
	$query="insert into juso14 (name14, tel14, sm14, birthday14, juso14)
			values('$name', '$tel', $sm, '$birthday','$juso');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
?>

<script>location.href="juso_list.php"</script>