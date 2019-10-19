<?
	include "../common.php";

	$name = $_REQUEST[name];

	if($_FILES["image"]["error"]==0)
	{
		$fname=$_FILES["image"]["name"];
		$fsize=$_FILES["image"]["size"];
		
		if(!move_uploaded_file($_FILES["image"]["tmp_name"], "./picture/".$fname)) exit("업로드 실패");
	}

	$query="insert into album14 (name14, image14) values ('$name', '$fname');";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>
<script>location.href="album.php"</script>