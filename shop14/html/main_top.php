<?
	$cookie_no = $_COOKIE[cookie_no];
	$cookie_name = $_COOKIE[cookie_name];
?>

<!-- 화면 상단 부분 시작 (main_top) ------------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->
			<table border="0" cellspacing="0" cellpadding="0" width="182">
				<tr>
					<td><a href="main.php"><img src="images/top_logo.png" width="182" height="40" border="0"></a></td>
				</tr>
			</table>
		</td>
		<td align="right" valign="bottom">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="main.php"><img src="images/top_menu01.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<?
						if(!$cookie_no) {
							echo("<td><a href='member_login.php'><img src='images/top_menu02.gif' border='0'></a></td>
							<td><img src='images/top_menu_line.gif' width='11'></td>
							<td><a href='member_agree.php'><img src='images/top_menu03.gif' border='0'></a></td>");
						}
						else {
							echo("<td><a href='member_logout.php'><img src='images/top_menu02_1.gif' border='0'></a></td>
							<td><img src='images/top_menu_line.gif' width='11'></td>
							<td><a href='member_edit.php'><img src='images/top_menu03_1.gif' border='0'></a></td>");
						}
					?>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<td><a href="cart.php"><img src="images/top_menu05.gif" border="0"></a></td>
					<td><img src="images/top_menu_line.gif" width="11"></td>
					<?
						if(!$cookie_no) {
							echo("<td><a href='jumun_login.php'><img src='images/top_menu06.gif' border='0'></a></td>");
						}
						else {
							echo("<td><a href='jumun.php'><img src='images/top_menu06.gif' border='0'></a></td>");
						}
					?>
					<td><img src="images/top_menu_line.gif"width="11"></td>
					<td><img src="images/top_menu08.gif" onclick="javascript:Add_Site();" style="cursor:hand"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<!--  메인 이미지 --------------------------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td style="background-color:black;"><img src="images/main_image0.gif" width="182" height="175"></td>
		<td><img src="images/main_menu11_off.jpg" width="777" height="175" onmouseover="img_change('on')" onmouseout="img_change('off')"></td>
	</tr>
</table>

<!--  Category 메뉴 : 가로형인 경우  --------------------------------------
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" bgcolor="#F7F7F7">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="product.html?no=1"><img src="images/main_menu01_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=2"><img src="images/main_menu02_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=3"><img src="images/main_menu03_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=4"><img src="images/main_menu04_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=5"><img src="images/main_menu05_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=6"><img src="images/main_menu06_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=7"><img src="images/main_menu07_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=8"><img src="images/main_menu08_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=9"><img src="images/main_menu09_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=10"><img src="images/main_menu10_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
------------------------------------------------------------------------>

<!-- 상품 검색 ------------------------------------->
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="1" colspan="5" bgcolor="#F7F7F7"></td></tr>
	<tr bgcolor="#000000">
		<?
			if(!$cookie_no)
				echo("<td width='181' align='center'><font color='#FFFFFF'>&nbsp <b>Welcome ! &nbsp;&nbsp 고객님.</b></font></td>");
			else 
				echo("<td width='181' align='center'><font color='#FFFFFF'>&nbsp <b>Welcome ! &nbsp;&nbsp $cookie_name 님.</b></font></td>");
			
		?>
		
		<!--<td style="font-size:9pt;color:#666666;font-family:돋움;padding-left:5px;"></td>
		<td align="right" style="font-size:9pt;color:#666666;font-family:돋움;"><b>상품검색 ▶&nbsp</b></td>
		form1 시작
		<form name="form1" method="post" action="product_search.html">
		<td width="135">
			<input type="text" name="findtext" maxlength="40" size="18" class="cmfont1">&nbsp;
		</td>
		</form>
		form1 끝
		<td width="65" align="center"><a href="javascript:Search()"><img src="images/i_search1.gif" border="0"></a></td>-->
	</tr>
	<tr><td height="1" colspan="5" bgcolor="#E5E5E5"></td></tr>
</table>
<!-- 화면 상단 부분 끝 (main_top) ------------------------------------->