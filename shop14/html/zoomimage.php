<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";
?>
<html>
<head>
<title>제품 확대 이미지</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="STYLESHEET" HREF="include/css.css" TYPE="text/css">
</head>

<body  marginwidth="0" marginheight="0" bgcolor="eeeeee">
<?
	$query="select * from product14 where no14=$no";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);

?>
<table width="700" border="0" cellpadding="0" cellspacing="0">
	<tr> 
		<td height="37" colspan="2"><img src="images/zoom_title.gif" width="705" height="53"></td>
	</tr>
	<tr> 
		<td width="540" height="500" align="center" valign = "top">
			<table width="100%" height="33" border="0" cellpadding="0" cellspacing="0"  align="center">
				<tr>
					<td width="540" height="24" align="center"><font color="#333333" style="font-size:10pt"><b><?=$row[name14]?></b></font></td>
				</tr>
			</table>
			<table width="540" border="1" cellpadding="0" cellspacing="0">
				<tr> 
					<td width="100%" height="500" align="center" valign = "middle" bgcolor="white">
						<a href="javascript:window.close();"><img src="product/<?=$row[image2_14]?>" width="700" border="0"></a>
					</td>
				</tr>
			</table>
			<table width="700" height="5" cellpadding="0"  cellspacing="0" bordercolor="#CCCCCC">
				<tr height = "5"><td></td></tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="30" colspan="2" align="center">
		<a href="javascript:window.close();"><img src="images/b_close.gif" border="0"></a>
		</td>
	</tr>
	<tr> 
		<td height="20" colspan="2" align="center">
	</td>
   </tr>	
</table>
</body>
</html>
