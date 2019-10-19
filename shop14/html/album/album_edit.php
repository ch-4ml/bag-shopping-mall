<?
	include "../common.php";
?>
<html>
<head>
	<title>앨범 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>
<?
	$query="select * from album14 where no14=$no";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);
?>
<form name="form1" method="post" action="album_update.php"  enctype="multipart/form-data">
<input type="hidden" name="no" value="<?=$no?>">

<table width="500"  bgcolor="#eeeeee" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">번호</td>
    <td width="400" align="left"><?=$row[no14]?></td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="20" value="<?=$row[name14]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">사진</td>
    <td width="400" align="left"> 그림이름: <?=$row[image14]?> <br>
      <input type="file" name="image" size="20" value="">
    </td>
  </tr>
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
		<input type="submit" value="저장"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>