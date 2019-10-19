<?
	include "../common.php";
	$name=$_POST[name];
	$pwd1=$_POST[pwd1];
	$birthday1=$_POST[birthday1];
	$birthday2=$_POST[birthday2];
	$birthday3=$_POST[birthday3];
	$tel1=$_POST[tel1];
	$tel2=$_POST[tel2];
	$tel3=$_POST[tel3];
	$phone1=$_POST[phone1];
	$phone2=$_POST[phone2];
	$phone3=$_POST[phone3];
	$zip=$_POST[zip];
	$juso=$_POST[juso];
	$email=$_POST[email];

	$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
	$phone=sprintf("%-3s%-4s%-4s",$phone1,$phone2,$phone3);
	$birthday=sprintf("%04d-%02d-%02d",$birthday1,$birthday2,$birthday3);


	
	$query="update member14 set name14='$name', tel14='$tel', phone14='$phone', birthday14='$birthday', juso14='$juso', email14='$email', zip14='$zip', pwd14='$pwd', sm14=$sm, gubun14=$gubun where no14=$no;";
	

  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");

  ?>

 <script>location.href="member.php"</script>