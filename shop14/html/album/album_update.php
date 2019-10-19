<?
	include "../common.php";
	$no = $_REQUEST[no];
	$name = $_REQUEST[name];
	
	$query="select * from album14 where no14=$no";
	$result=mysqli_query($db,$query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);
	
	$fname=$row[image14];

	if($_FILES["image"]["error"]==0)
	{
		$fname=$_FILES["image"]["name"];
		$fsize=$_FILES["image"]["size"];
		
		if(!move_uploaded_file($_FILES["image"]["tmp_name"], "./picture/".$fname)) exit("업로드 실패");
	}

	$query="update album14 set name14='$name', image14='$fname' where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>
<script>location.href="album.php"</script>