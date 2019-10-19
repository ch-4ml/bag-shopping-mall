<?
	include "common.php";
	
	$tel=sprintf("%-3s%-4s%-4s",$tel1, $tel2, $tel3);
	$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
	$name = $_REQUEST[name];
	$query="update juso14 set name14='$name', tel14='$tel', sm14=$sm, birthday14='$birthday', juso14='$juso' where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
?>

<script>location.href="juso_list.php"</script>