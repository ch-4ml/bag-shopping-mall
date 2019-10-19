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
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
<link rel="stylesheet" type="text/css" href="include/mystyle.css">
</head>

<body style="margin:0">
<center>
<?
	include "main_top.php";
?>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 ----------------------------------------------->
			<?
				include "main_left.php";
			?>
			<!--  화면 좌측메뉴 끝 ------------------------------------------------->
		</td>
		<td width="10"></td>
		<td valign="top">

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">

			function cart_edit(kind,pos) {
				if (kind=="deleteInOrder")	{
					location.href = "cart_edit.php?kind=deleteInOrder&pos="+pos;
				}
			}

			function Check_Value() {
				if (!form2.o_name.value) {
					alert("주문자 이름이 잘 못 되었습니다.");	form2.o_name.focus();	return;
				}
				if (!form2.o_tel1.value || !form2.o_tel2.value || !form2.o_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.o_tel1.focus();	return;
				}
				if (!form2.o_phone1.value || !form2.o_phone2.value || !form2.o_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.o_phone1.focus();	return;
				}
				if (!form2.o_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.o_email.focus();	return;
				}
				if (!form2.o_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.o_zip.focus();	return;
				}
				if (!form2.o_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.o_juso.focus();	return;
				}

				if (!form2.r_name.value) {
					alert("받으실 분의 이름이 잘 못 되었습니다.");	form2.r_name.focus();	return;
				}
				if (!form2.r_tel1.value || !form2.r_tel2.value || !form2.r_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.r_tel1.focus();	return;
				}
				if (!form2.r_phone1.value || !form2.r_phone2.value || !form2.r_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.r_phone1.focus();	return;
				}
				if (!form2.r_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.r_email.focus();	return;
				}
				if (!form2.r_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.r_zip.focus();	return;
				}
				if (!form2.r_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.r_juso.focus();	return;
				}

				form2.submit();
			}

			function FindZip(zip_kind) 
			{
				window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=500,height=250");
			}

			function SameCopy(str) {
				if (str == "Y") {
					form2.r_name.value = form2.o_name.value;
					form2.r_zip.value = form2.o_zip.value;
					form2.r_juso.value = form2.o_juso.value;
					form2.r_tel1.value = form2.o_tel1.value;
					form2.r_tel2.value = form2.o_tel2.value;
					form2.r_tel3.value = form2.o_tel3.value;
					form2.r_phone1.value = form2.o_phone1.value;
					form2.r_phone2.value = form2.o_phone2.value;
					form2.r_phone3.value = form2.o_phone3.value;
					form2.r_email.value = form2.o_email.value;
				}
				else {
					form2.r_name.value = "";
					form2.r_zip.value = "";
					form2.r_juso.value = "";
					form2.r_tel1.value = "";
					form2.r_tel2.value = "";
					form2.r_tel3.value = "";
					form2.r_phone1.value = "";
					form2.r_phone2.value = "";
					form2.r_phone3.value = "";
					form2.r_email.value = "";
				}
			}

			</script>
<?
	$n_cart=$_COOKIE[n_cart];
	$cart=$_COOKIE[cart];
	$num=$_REQUEST[num];
?>
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710">
				<tr>
					<td><img src="images/order_title1.gif" width="65" height="15" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="420" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="80"	align="center">가격</td>
					<td width="90"	align="center">합계</td>
					<td width="50"  align="center">삭제</td>
				</tr>
				<?
					$total=0;
					for($i=1;$i<=$n_cart;$i++) {
						if($cart[$i]) {
							list($no, $num, $opts1, $opts2, $opts3)=explode("^", $cart[$i]);
							$query="select * from product14 where no14=$no";
							$result=mysqli_query($db, $query);
							if(!$result) exit("$query");
							$row=mysqli_fetch_array($result);
							
							if($opts1 != null) {
								$query="select * from opts14 where opt_no14=$row[opt1_14] and no14=$opts1";
								$result=mysqli_query($db, $query);
								if(!$result) exit("$query");
								$row_opts1=mysqli_fetch_array($result);

								$query="select * from opt14 where no14=$row_opts1[opt_no14]";
								$result=mysqli_query($db, $query);
								if(!$result) exit("$query");
								$row_opt1=mysqli_fetch_array($result);
							}
							if($opts2 != null) {
								$query="select * from opts14 where opt_no14=$row[opt2_14] and no14=$opts2";
								$result=mysqli_query($db, $query);
								if(!$result) exit("$query");
								$row_opts2=mysqli_fetch_array($result);

								$query="select * from opt14 where no14=$row_opts2[opt_no14]";
								$result=mysqli_query($db, $query);
								if(!$result) exit("$query");
								$row_opt2=mysqli_fetch_array($result);
							}
							if($opts3 != null) {
								$query="select * from opts14 where opt_no14=$row[opt3_14] and no14=$opts3";
								$result=mysqli_query($db, $query);
								if(!$result) exit("$query");
								$row_opts3=mysqli_fetch_array($result);

								$query="select * from opt14 where no14=$row_opts3[opt_no14]";
								$result=mysqli_query($db, $query);
								if(!$result) exit("$query");
								$row_opt3=mysqli_fetch_array($result);
							}
							$d_price=number_format(round(($row[price14])*(100-$row[discount14])/100, -3));
							$total_d_price=number_format($num*round(($row[price14])*(100-$row[discount14])/100, -3));
							echo("<tr>
								<td height='60' align='center' bgcolor='#FFFFFF'>
									<table cellpadding='0' cellspacing='0' width='100%'>
										<tr>
											<td width='60'>
												<a href='product_detail.php?no=$row[no14]'><img src='product/$row[image1_14]' width='50' height='50' border='0'></a>
											</td>
											<td class='cmfont'>
												<a href='product_detail.php?no=$row[no14]'>$row[name14]</a><br>");
												if($row[opt1_14])
													echo("<font color='#0066CC'>[$row_opt1[name14]]</font> $row_opts1[name14]<br>");
												if($row[opt2_14])
													echo("<font color='#0066CC'>[$row_opt2[name14]]</font> $row_opts2[name14]<br>");
												if($row[opt3_14])
													echo("<font color='#0066CC'>[$row_opt3[name14]]</font> $row_opts3[name14]");
											echo("</td>
										</tr>
									</table>
								</td>
								<td align='center' bgcolor='#FFFFFF'>
									<font color='#464646'>$num 개</font>
								</td>
								<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$d_price</font></td>
								<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$total_d_price</font></td>
								<td align='center' bgcolor='#FFFFFF'>
									<a href = 'javascript:cart_edit(\"deleteInOrder\",\"$i\")'><img src='images/b_delete1.gif' border='0'></a>&nbsp
								</td>
							</tr>");
							$price=$num*round(($row[price14])*(100-$row[discount14])/100, -3);
							$total=$total+$price;
						}
					}
					if($total>$max_baesongbi) $baesongbi=0;
					$price_total=$total;
					$total=$total+$baesongbi;

					$f_price_total=number_format($price_total);
					$f_total=number_format($total);
					$f_baesongbi=number_format($baesongbi);
				?>
				<tr>
					<td colspan="5" bgcolor="#F0F0F0">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr>
								<td bgcolor="#F0F0F0"><img src="images/cart_image1.gif" border="0"></td>
								<td align="right" bgcolor="#F0F0F0">
									<font color="#0066CC"><b>총 합계금액</font></b> : 상품대금(<?=$f_price_total?>원) + 배송료(<?=$f_baesongbi?>원) = <font color="#FF3333"><b><?=$f_total?>원</b></font>&nbsp;&nbsp
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br><br>

			<!-- 주문자 정보 -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
			</table>
			<?
			
				$o_no="";
				$o_name="";
				$o_tel1="";
				$o_tel2="";
				$o_tel3="";
				$o_phone1="";
				$o_phone2="";
				$o_phone3="";
				$o_email="";
				$o_zip="";
				$o_juso="";
				
				if ($cookie_no) // 쿠키로 로그인했는지 조사
				{
					$query="select * from member14 where no14=$cookie_no";
					$result=mysqli_query($db, $query);
					if(!$result) exit("$query");
					$row=mysqli_fetch_array($result);
					$tel1=trim(substr($row[tel14],0,3));
					$tel2=trim(substr($row[tel14],3,4));
					$tel3=trim(substr($row[tel14],7,4));
					$phone1=substr($row[phone14],0,3);
					$phone2=substr($row[phone14],3,4);
					$phone3=substr($row[phone14],7,4);
				
					$o_no=$row[no14];
					$o_name=$row[name14];
					$o_tel1=$tel1;
					$o_tel2=$tel2;
					$o_tel3=$tel3;
					$o_phone1=$phone1;
					$o_phone2=$phone2;
					$o_phone3=$phone3;
					$o_email=$row[email14];
					$o_zip=$row[zip14];
					$o_juso=$row[juso14];
				}
			?>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="order_pay.php">
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
						<font size="2" color="#B90319"><b>주문자 정보</b></font>
					</td>
					<td align="center" width="560">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b><font color="white">주문자 성명</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="hidden" name="o_no" value="">
									<input type="text"   name="o_name" size="20" maxlength="10" value="<?=$o_name?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b><font color="white">전화번호</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_tel1" size="4" maxlength="4" value="<?=$o_tel1?>" class="cmfont1"> -
									<input type="text" name="o_tel2" size="4" maxlength="4" value="<?=$o_tel2?>" class="cmfont1"> -
									<input type="text" name="o_tel3" size="4" maxlength="4" value="<?=$o_tel3?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b><font color="white">휴대폰번호</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_phone1" size="4" maxlength="4" value="<?=$o_phone1?>" class="cmfont1"> -
									<input type="text" name="o_phone2" size="4" maxlength="4" value="<?=$o_phone2?>" class="cmfont1"> -
									<input type="text" name="o_phone3" size="4" maxlength="4" value="<?=$o_phone3?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b><font color="white">E-Mail</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_email" size="50" maxlength="50" value="<?=$o_email?>" class="cmfont1">
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b><font color="white">주소</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_zip" size="5" maxlength="5" value="<?=$o_zip?>" class="cmfont1"> 
									<a href="javascript:FindZip(1)"><img src="images/b_zip.gif" align="absmiddle" border="0"></a> <br>
									<input type="text" name="o_juso" size="55" maxlength="200" value="<?=$o_juso?>" class="cmfont1"><br>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<!-- 배송지 정보 -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5"><font size=2 color="#B90319"><b>배송지 정보</b></font></td>
					<td align="center" width="560">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b><font color="white">주문자정보와 동일</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="radio" name="same" onclick="SameCopy('Y')">예 &nbsp;
									<input type="radio" name="same" onclick="SameCopy('N')">아니오
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b><font color="white">받으실 분 성명</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_name" size="20" maxlength="10" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b><font color="white">전화번호</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_tel1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b><font color="white">휴대폰번호</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_phone1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b><font color="white">E-Mail</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_email" size="50" maxlength="50" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b><font color="white">주소</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_zip" size="5" maxlength="5" value="" class="cmfont1"> 
									<a href="javascript:FindZip(2)"><img src="images/b_zip.gif" align="absmiddle" border="0"></a> <br>
									<input type="text" name="r_juso" size="55" maxlength="200" value="" class="cmfont1"><br>
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b><font color="white">배송시요구사항</font></b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<textarea name="memo" cols="60" rows="3" class="cmfont1"></textarea>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			</form>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="center">
						<img src="images/b_order4.gif" onclick="Check_Value()" style="cursor:hand">

						
					</td>
				</tr>
				<tr height="20"><td></td></tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

		</td>
	</tr>
</table>


<!-- 화면 하단 부분 : 회사정보/회사소개/이용정보/개인보호정책 ... ---------------------------->
<?
	include "main_bottom.php";
?>
&nbsp
</center>

</body>
</html>