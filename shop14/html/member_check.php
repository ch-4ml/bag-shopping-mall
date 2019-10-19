<?
	include "common.php";
	$uid = $_POST[uid];
	$pwd = $_POST[pwd];

	$query="select no14, name14 from member14 where uid14='$uid' and pwd14='$pwd'";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	if($count>0) {
		setcookie("cookie_no", $row[no14]);
		setcookie("cookie_name", $row[name14]);
		echo("<script>location.href='index.html'</script>");
	}
	else
		echo("<script>location.href='member_login.php'</script>");
?>
