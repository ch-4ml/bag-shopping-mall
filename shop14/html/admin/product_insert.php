<?
	include "../common.php";

	$no = $_REQUEST[no];
	$menu = $_REQUEST[menu];
	$code = $_REQUEST[code];
	$name = $_REQUEST[name];
	$coname = $_REQUEST[coname];
	$price = $_REQUEST[price];

	$name_add = addslashes($name);
	$contents_add = addslashes($contents);
	$regday=sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);
	if(!$icon_new) $icon_new=0; else $icon_new=1;
	if(!$icon_hit) $icon_hit=0; else $icon_hit=1;
	if(!$icon_sale) {
		$icon_sale=0;
		$discount=0;
	}
	else {
		$icon_sale=1;
	}
	$query="select * from product14";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$count=mysqli_num_rows($result);
	for($i=0;$i<$count;$i++) {
		$row=mysqli_fetch_array($result);
	}
	$namecount=$row[no14]+1;

	if($_FILES["image1"]["error"]==0)
	{
		$fname1=$_FILES["image1"]["name"];
		$fsize1=$_FILES["image1"]["size"];
		$newfname1=$namecount."_1.jpg";
		if(!move_uploaded_file($_FILES["image1"]["tmp_name"], "../product/".$newfname1)) exit("업로드 실패");

		echo("파일 명 : $fname1<br> 파일 크기 : $fsize1");
	}
	if($_FILES["image2"]["error"]==0)
	{
		$fname2=$_FILES["image2"]["name"];
		$fsize2=$_FILES["image2"]["size"];
		$newfname2=$namecount."_2.jpg";
		if(!move_uploaded_file($_FILES["image2"]["tmp_name"], "../product/".$newfname2)) exit("업로드 실패");

		echo("파일 명 : $fname2<br> 파일 크기 : $fsize2");
	}
	if($_FILES["image3"]["error"]==0)
	{
		$fname3=$_FILES["image3"]["name"];
		$fsize3=$_FILES["image3"]["size"];
		$newfname3=$namecount."_3.jpg";
		if(!move_uploaded_file($_FILES["image3"]["tmp_name"], "../product/".$newfname3)) exit("업로드 실패");

		echo("파일 명 : $fname3<br> 파일 크기 : $fsize3");
	}

	$query="insert into product14 (menu14, code14, name14, coname14, price14, opt1_14, opt2_14, opt3_14, contents14, status14, regday14, icon_new14, icon_hit14, icon_sale14, discount14, image1_14, image2_14, image3_14) values ('$menu', '$code', '$name_add', '$coname', '$price', '$opt1', '$opt2', '$opt3', '$contents_add', '$status', '$regday', '$icon_new', '$icon_hit', '$icon_sale', '$discount', '$newfname1', '$newfname2', '$newfname3');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");

?>
<script>location.href="product.php"</script>