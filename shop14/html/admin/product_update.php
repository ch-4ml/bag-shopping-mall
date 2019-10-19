<?
	include "../common.php";

	$no = $_REQUEST[no];
	$menu = $_REQUEST[menu];
	$code = $_REQUEST[code];
	$name = $_REQUEST[name];
	$coname = $_REQUEST[coname];
	$price = $_REQUEST[price];
	$imagename1 = $_REQUEST[imagename1];
	$imagename2 = $_REQUEST[imagename2];
	$imagename3 = $_REQUEST[imagename3];
	$checkno1 = $_REQUEST['checkno1'];
	$checkno2 = $_REQUEST['checkno2'];
	$checkno3 = $_REQUEST['checkno3'];

	$query="select * from product14 where no14=$no";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);

	$newfname1=$imagename1;
	if(isset($checkno1)) $newfname1="";

	$newfname2=$imagename2;
	if(isset($checkno2)) $newfname2="";

	$newfname3=$imagename3;
	if(isset($checkno3)) $newfname3="";

	if($_FILES["image1"]["error"]==0)
	{
		$newfname1=$row[no14]."_1.jpg";
		if(!move_uploaded_file($_FILES["image1"]["tmp_name"], "../product/".$newfname1)) exit("업로드 실패");
	}

	if($_FILES["image2"]["error"]==0)
	{
		$newfname2=$row[no14]."_2.jpg";
		if(!move_uploaded_file($_FILES["image2"]["tmp_name"], "../product/".$newfname2)) exit("업로드 실패");
	}

	if($_FILES["image3"]["error"]==0)
	{
		$newfname3=$row[no14]."_3.jpg";
		if(!move_uploaded_file($_FILES["image3"]["tmp_name"], "../product/".$newfname3)) exit("업로드 실패");
	}

	$regday=sprintf("%04d-%02d-%02d",$regday1,$regday2,$regday3);

	$query="update product14 set menu14='$menu', code14='$code', name14='$name', coname14='$coname', price14='$price', opt1_14='$opt1', opt2_14='$opt2', opt3_14='$opt3', contents14='$contents', status14='$status', regday14='$regday', icon_new14='$icon_new', icon_hit14='$icon_hit', icon_sale14='$icon_sale', discount14='$discount', image1_14='$newfname1', image2_14='$newfname2', image3_14='$newfname3' where no14=$no;";

	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>

<script>location.href="product.php?sel1=<?=$sel1?>&sel2=<?=$sel2?>&sel3=<?=$sel3?>&sel4=<?=$sel4?>&text1=<?=$text1?>&page=<?=$page?>&no=<?=$no?>"</script>