<?
	include "../common.php";

	$query="update jumun14 set state14='$state' where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>
<script>location.href="jumun.php?no=<?=$no?>&state=<?=$state?>&page=<?=$page?>&sel1=<?=$sel1?>&sel2=<?=$sel2?>&text1=<?=$text1?>&day1_y=<?=$day1_y?>&day1_m=<?=$day1_m?>&day1_d=<?=$day1_d?>&day2_y=<?=$day2_y?>&day2_m=<?=$day2_m?>&day2_d=<?=$day2_d?>"</script>