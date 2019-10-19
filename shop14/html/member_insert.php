<?
	include "common.php";
	
	$name=$_REQUEST[name];
	$uid=$_REQUEST[uid];
	$tel=sprintf("%-3s%-4s%-4s",$tel1, $tel2, $tel3);
	$phone=sprintf("%-3s%-4s%-4s",$phone1, $phone2, $phone3);
	$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	$query="insert into member14 (uid14, pwd14, name14, birthday14, sm14, tel14, phone14, email14, zip14, juso14, gubun14)
			values('$uid','$pwd','$name','$birthday','$sm','$tel','$phone','$email','$zip','$juso','$gubun14');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
?>

<script>location.href="member_joinend.php"</script>