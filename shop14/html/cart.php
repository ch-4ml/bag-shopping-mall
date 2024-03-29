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
<?
	$n_cart=$_COOKIE[n_cart];
	$cart=$_COOKIE[cart];
	$num=$_REQUEST[num];
?>
			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function cart_edit(kind,pos) {
				if (kind=="deleteall") 
				{
					location.href = "cart_edit.php?kind=deleteall";
				} 
				else if (kind=="delete")	{
					location.href = "cart_edit.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>

			<!-- form2 시작  -->
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td height="30" align="left"><img src="images/cart_title.gif" width="746" height="30" border="0"></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710" class="cmfont">
				<tr>
					<td><img src="images/cart_title1.gif" border="0"></td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710">
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="420" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="80"  align="center">가격</td>
					<td width="90"  align="center">합계</td>
					<td width="50"  align="center">삭제</td>
				</tr>

				<form name="form2" method="post">
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
									<input type='text' name='num$i' size='3' value='$num' class='cmfont1'>&nbsp<font color='#464646'>개</font>
								</td>
								<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$d_price</font></td>
								<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$total_d_price</font></td>
								<td align='center' bgcolor='#FFFFFF'>
									<a href = 'javascript:cart_edit(\"update\",\"$i\")'><img src='images/b_edit1.gif' border='0'></a>&nbsp<br>
									<a href = 'javascript:cart_edit(\"delete\",\"$i\")'><img src='images/b_delete1.gif' border='0'></a>&nbsp
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
			</form>
			<!-- form2 끝  -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="44">
					<td width="710" align="center" valign="middle">
						<a href="index.html"><img src="images/b_shopping.gif" border="0"></a>&nbsp;&nbsp;
						<a href="javascript:cart_edit('deleteall',0)"><img src="images/b_cartalldel.gif" width="103" height="26" border="0"></a>&nbsp;&nbsp;
						<a href="order.php"><img src="images/b_order1.gif" border="0"></a>
					</td>
				</tr>
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