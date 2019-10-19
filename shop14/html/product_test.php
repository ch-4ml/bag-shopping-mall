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
	$query="select * from product14 where menu14='$menu'";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
?>

<!-- 화면 상단 부분 시작 (main_top) ------------------------------------->
<?
	include "main_top.php";
?>
<!-- 화면 상단 부분 끝 (main_top) ------------------------------------->

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

      <!-- 하위 상품목록 -->

			<!-- form2 시작 -->
			<form name="form2" method="post" action="product_test.php">
			<input type="hidden" name="menu" value="<?=$menu?>">

			<table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#efefef">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
												<font color="#C83762" class="cmfont"><b>dddd &nbsp</b></font>&nbsp
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b>16</b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="100">
															<select name="sort" size="1" class="cmfont" onChange="form2.submit()">
																<?
																	if(!$sort) $sort="new";
																	for($i=0;$i<$n_sort;$i++) {
																		if($sort==$a_sort[$i])
																			echo("<option value='$a_sort[$i]'>$a_sortname[$i]</option> selected");
																		else
																			echo("<option value='$a_sort[$i]'>$a_sortname[$i]</option>");
																	}
																?>
															</select>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 -->

			<table border="0" cellpadding="0" cellspacing="0">
				<!--- 1 번째 줄 -->
				<tr>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=1"><font color="444444">메뉴1 상품</font></a>&nbsp; 
									<img src="images/i_hit.gif" align="absmiddle" vspace="1"> <img src="images/i_new.gif" align="absmiddle" vspace="1"> 
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>
					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 
									<img src="images/i_hot.gif" align="absmiddle" vspace="1"> <img src="images/i_sale.gif" align="absmiddle" vspace="1"> <font color="red">20%</font>
								</td>
							</tr>
							<tr><td height="20" align="center"><strike>98,000 원</strike><br><b>70,000 원</b></td></tr>
						</table>
					</td>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 												
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 												
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 												
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>

				</tr>
				<tr><td height="10"></td></tr>
				<!--- 2 번째 줄 -->
				<tr>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=1"><font color="444444">메뉴1 상품</font></a>&nbsp; 
									<img src="images/i_hit.gif" align="absmiddle" vspace="1"> <img src="images/i_new.gif" align="absmiddle" vspace="1"> 
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>
					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 
									<img src="images/i_hot.gif" align="absmiddle" vspace="1"> <img src="images/i_sale.gif" align="absmiddle" vspace="1"> <font color="red">20%</font>
								</td>
							</tr>
							<tr><td height="20" align="center"><strike>98,000 원</strike><br><b>70,000 원</b></td></tr>
						</table>
					</td>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 												
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 												
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>

					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">메뉴1 상품</font></a>&nbsp; 												
								</td>
							</tr>
							<tr><td height="20" align="center"><b>98,000 원</b></td></tr>
						</table>
					</td>

				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td height="40" class="cmfont" align="center">
						<img src="images/i_prev.gif" align="absmiddle" border="0"> 
						<font color="#FC0504"><b>1</b></font>&nbsp;
						<a href="product.html?menu=1&sort=1&page=1"><font color="#7C7A77">[2]</font></a>&nbsp;
						<a href="product.html?menu=1&sort=1&page=1"><font color="#7C7A77">[3]</font></a>&nbsp;
						<img src="images/i_next.gif" align="absmiddle" border="0">
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
<br><br>
<?
	include "main_bottom.php";
?>
&nbsp
</center>

</body>
</html>