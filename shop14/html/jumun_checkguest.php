<?
	include "common.php";
	$name = $_POST[name];
	$email = $_POST[email];

	$query="select * from jumun14 where o_name14='$name' and o_email14='$email'";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	if($count>0)
		echo("<script>location.href='jumun.php?name=$name&email=$email'</script>");
	else
		echo("<script>location.href='jumun_login.php'</script>");
?>
