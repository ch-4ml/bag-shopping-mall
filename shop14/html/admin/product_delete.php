<?
	include "../common.php";

	$query="delete from product14 where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>

<script>location.href="product.php?sel1=<?=$sel1?>&sel2=<?=$sel2?>&sel3=<?=$sel3?>&sel4=<?=$sel4?>&text1=<?=$text1?>&page=<?=$page?>&no=<?=$no?>"</script>