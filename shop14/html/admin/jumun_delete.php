<?
	include "../common.php";

	$query="delete from jumun14 where no14='$no'";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$query="delete from jumuns14 where jumun_no14='$no'";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>
<script>location.href="jumun.php?page=<?=$page?>&sel1=<?=$sel1?>&sel2=<?=$sel2?>&text1=<?=$text1?>&day1_y=<?=$day1_y?>&day1_m=<?=$day1_m?>&day1_d=<?=$day1_d?>&day2_y=<?=$day2_y?>&day2_m=<?=$day2_m?>&day2_d=<?=$day2_d?>"</script>