<?
	include "common.php";

	$name = $_REQUEST[name];
	$query="update sj14 set name14='$name', kor14=$kor, eng14=$eng, 
			mat14=$mat, hap14=$hap, avg14=$avg where no14=$no;";
	$result=mysqli_query($db,$query);
	if(!$result) exit("Äõ¸®¿¡·¯");
?>

<script>location.href="sj_list.php"</script>
