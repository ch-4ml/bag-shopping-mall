<?
	include "../common.php";

	$name=$_REQUEST[name];
	$opt_no=$_REQUEST[opt_no];
	$query="insert into opts14 (opt_no14, name14, price14) values ('$no1', '$name', '$price');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>
<script>location.href="opts.php?no1=<?=$no1?>"</script>