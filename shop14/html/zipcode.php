<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->
<?
	error_reporting(E_ALL & ~E_NOTICE);
	ini_set("display_errors", 1);

	$db = mysqli_connect("localhost","zip","zips","zip");
	if(!$db) exit("DB연결에러");

	extract($_POST);
	extract($_GET);

	$zip_kind=$_REQUEST[zip_kind];
?>

<html>
<head>
<title>우편번호 및 주소 찾기</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">

<script language="javascript">
function SearchZip() 
{
	if (form.sel.value==0) 
	{
		alert("시,도를 먼저 선택하세요.");
		form.sel.focus();
		return;
	}
	if (!form.text1.value) 
	{
		alert("검색하실 도로명이나 건물명을 입력해 주십시오.");
		form.text1.focus();
		return;
	}
	form.submit();
}
function SendZip(zip_kind) 
{
	if (form1.jusor.value == "") {
		alert("나머지 주소를 입력하여 주십시오.");
		form1.jusor.focus();
		return;
	}
	var str, zip, juso;
	str = form1.post_no.value;
	str = str.split("^^");
	zip = str[0];
	juso = str[1] + " " + form1.jusor.value;

	if (zip_kind==1)			
	{
		opener.form2.o_zip.value = zip;
		opener.form2.o_juso.value = juso;
	} else if (zip_kind==2)	{
		opener.form2.r_zip.value = zip;
		opener.form2.r_juso.value = juso;
	} else {
		opener.form2.zip.value = zip;
		opener.form2.juso.value = juso;
	}

	self.close();
}
</script>
</head>
<body bgcolor="#FFFFFF" style="margin:0">

<script language="javascript">
	window.resizeTo(500, 360);
</script>

<table width="500" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td><p><img src="images/zipcode_title.gif" border="0"></p></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><br>
			<form  name="form" method="post" action="zipcode.php">
			<input type="hidden" name="zip_kind" value="<?=$zip_kind?>">
			<table width="495" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td width="14">&nbsp;</td>
					<td width="465" align="center">
						<table width="86%" border="0" cellspacing="5" cellpadding="0">
							<tr height="20">
								<td colspan="3" valign="middle" width="305">
									<span style="font-size:9pt;"><font color="#666666"><b>검색할 도로명이나 건물명 일부를 입력해 주세요</b></font></span>
								</td>
							</tr>
							<tr> 
								<td>
									<? 
										if(!$sel) $sel=0;
										$area=["시,도 선택","서울","경기","인천","강원","충북","세종","충남","대전","경북","대구","울산","부산","경남","전북","전남","광주","제주"];
									?>
									<select border="0" name="sel" class="cmfont">
										<?
											for($i=0;$i<=17;$i++)
											{
												if($i==$sel)
													echo("<option value='$i' selected>$area[$i]</option>");
												else
													echo("<option value='$i'>$area[$i]</option>");
											}
										?>
									</select>
								</td>
								<td ><input name="text1" type="text" size="20" maxlength="20" value = "<?=$text1?>" style = "border:1 solid #E5E5E5;font-size:9pt"></td>
								<td width="134"><a href = "javascript:SearchZip()"><img src="images/b_search.gif" border="0"></a></td>
							</tr>
						</table>
					</td>
					<td width="16">&nbsp;</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>

<table width="500" border="0"cellpadding="0"cellspacing="0">
	<form name="form1">
	<tr height="30"> 
		<td align="center">
			<!-- 도로명 우편번호 인 경우 -->
			<select border="0" name="post_no" style="BACKGROUND-COLOR: #E3E7EB; width:440px;" class="cmfont">
				<?
					$query="select * from zip$sel where juso4 like '%$text1%' or juso7 like '%$text1%'";
					$result=mysqli_query($db,$query);
					if(!$result) exit("쿼리에러 $query");
					
					$count=mysqli_num_rows($result);

					for($i=0; $i<$count;$i++)
					{
						$row = mysqli_fetch_array($result);
						$A=$row[juso1]." ".$row[juso2]." ".$row[juso3]." ".$row[juso4];
						if($row[juso5])$A=$A." $row[juso5]";
						if($row[juso6]!="0") $A=$A."-$row[juso6]";
						if($row[juso7])$A=$A." $row[juso7]";
						$zip=$row[zip];
						echo("<option value='$zip^^$A'>[$zip] $A</option>");
					}
				?>
			</select>
		</td>
	</tr>
	<tr height="30"> 
		<td align="center">
			<input type="text" name="jusor" size="44" maxlength="50" STYLE="width:440;border:1 solid #E5E5E5" class="cmfont"><br><br>
			<b><font color="#666666"><span style="font-size:9pt;">나머지 주소를 입력해 주세요</span></font></b>
		</td>
	</tr>
	<!-- 회원가입인 경우 : SendZip(0), 주문지인 경우 : SendZip(1), 배송지인 경우 : SendZip(2) -->
	<tr height="55"> 
		<td align="center">
			<a href="javascript:SendZip(<?=$zip_kind?>)"><img src="images/b_ok1.gif" border="0"></a>
		</td>
	</tr>
</form>
</table>

</body>
</html>



