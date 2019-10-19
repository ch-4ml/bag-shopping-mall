<?
	include "common.php";	

	$name = $_REQUEST[name];
	$query="insert into sj14 (name14, kor14, eng14, mat14, hap14, avg14)
				values ('$name', $kor, $eng, $mat, $hap, $avg);";
	$result=mysqli_query($db,$query);
	if(!$result) exit("Äõ¸®¿¡·¯");
?>

<script>location.href="sj_list.php"</script>