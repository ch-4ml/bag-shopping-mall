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
	$query="select * from album14 order by no14";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$count=mysqli_num_rows($result);

	$num_col=3;
	$num_row=2;
	$icount=0;

?>
<table width="500" border="0">
	<form name="form1" method="post" action="album.php">
	<tr>
		<td align="right"><a href="album_new.php">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="500"border="0">
<?
	for($ir=0;$ir<$num_row;$ir++) {
		echo("<tr>");
		for($ic=0;$ic<$num_col;$ic++) {
			if($icount<$count) {
				$row=mysqli_fetch_array($result);
				echo("<td width='150' align='center'>
						<table class='mytable'>
							<tr><td align='center'><img src='picture/$row[image14]' width='150' height='100'></td></tr>
							<tr><td align='center'>$row[name14]</td></tr>
							<tr>
								<td width='100' align='center'>
									<a href='album_edit.php?no=$row[no14]'>수정</a> / 
									<a href='album_delete.php?no=$row[no14]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
								</td>
							</tr>
						</table>
					</td>");
			}
			else
				echo("<td></td>");
			$icount++;
			echo("<td width='150' align='center'></td>");
		}
		echo("</tr>");
	}
?>
</table>

</body>
</html>
