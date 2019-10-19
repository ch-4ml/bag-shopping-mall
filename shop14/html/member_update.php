<?
	include "common.php";

	$name = $_POST[name];
	$uid=$_POST[uid];
	$pwd1=$_POST[pwd1];
	$tel=sprintf("%-3s%-4s%-4s",$tel1, $tel2, $tel3);
	$phone=sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
	$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
	if(!$pwd1) {
		$query="update member14 set name14='$name', birthday14='$birthday', sm14='$sm', tel14='$tel', phone14='$phone', email14='$email',zip14='$zip', juso14='$juso' where no14='$cookie_no';";
	}
	else {
		$query="update member14 set pwd14='$pwd1', name14='$name', birthday14='$birthday', sm14='$sm', tel14='$tel', phone14='$phone', email14='$email',zip14='$zip', juso14='$juso' where no14='$cookie_no';";
	}
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	setcookie("cookie_name", $name);
?>

<script>location.href="index.html"</script>