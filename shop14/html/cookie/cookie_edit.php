<?
	$no=$_REQUEST[no];
	$name=$_REQUEST[name];
	$num=$_REQUEST[num];
	$n_data=$_COOKIE[n_data];
	$data=$_COOKIE[data];

	list($no, $name, $num) = explode("^^", $data[$no]);
?>
<html>
<head>
	<title>쿠키 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>

<form name="form1" method="post" action="cookie_update.php">

<input type="hidden" name="no" value="<?=$no?>">

<table width="500"  bgcolor="#eeeeee" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">쿠키번호</td>
    <td width="400" align="left"><?=$no?></td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">제품명</td>
    <td width="400" align="left">
      <input type="text" name="name" size="15" value="<?=$name?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">수량</td>
    <td width="400" align="left">
      <input type="text" name="num" size="15" value="<?=$num?>">
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