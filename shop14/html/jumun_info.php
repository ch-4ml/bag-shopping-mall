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

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title2.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td colspan="6" height="2" bgcolor="8B9CBF"></td></tr>
				<tr>
					<td width="60"  bgcolor="F2F2F2" align="center" height="30"></td>
					<td width="395" bgcolor="F2F2F2" align="center">상품명</td>
					<td width="50"  bgcolor="F2F2F2" align="center">수량</td>
					<td width="90"  bgcolor="F2F2F2" align="center">금액</td>
					<td width="90"  bgcolor="F2F2F2" align="center">합계</td>
				</tr>
				<tr><td colspan="6" bgcolor="DEDCDD"></td></tr>
				<?
					$query="select product14.no14 as product_no14, product14.name14 as p_name, product14.image1_14, jumuns14.num14, jumuns14.price14, jumuns14.cash14, jumuns14.discount14, opts1.name14 as opts1_name, opts2.name14 as opts2_name, opts3.name14 as opts3_name, opt1.name14 as opt1_name, opt2.name14 as opt2_name, opt3.name14 as opt3_name from ((((((jumuns14 left join product14 on jumuns14.product_no14=product14.no14) left join opts14 as opts1 on jumuns14.opts_no1_14=opts1.no14) left join opts14 as opts2 on jumuns14.opts_no2_14=opts2.no14) left join opts14 as opts3 on jumuns14.opts_no3_14=opts3.no14) left join opt14 as opt1 on product14.opt1_14=opt1.no14) left join opt14 as opt2 on product14.opt2_14=opt2.no14) left join opt14 as opt3 on product14.opt3_14=opt3.no14 where jumuns14.jumun_no14='$no';";
					$result=mysqli_query($db, $query);
					if(!$result) exit("$query");
					$count=mysqli_num_rows($result);
					
					for($i=0;$i<$count;$i++) {
						$row=mysqli_fetch_array($result);
						$f_price=number_format($row[price14]);
						$f_cash=number_format($row[cash14]);
						if($row[p_name]=="") $p_name="배송비";
						else $p_name=$row[p_name];
						
						echo("<tr>
					<td width='60'>
						<a href='product_detail.php?no=$row[product_no14]'><img src='product/$row[image1_14]' width='50' height='50' border='0'></a>
					</td>
					<td height='52'>
						<font color='686868'>$p_name</font><br>");
						if($row[opt1_name])
							echo("<font color='#0066CC'>[$row[opt1_name]]</font> $row[opts1_name]<br>");
						if($row[opt2_name])
							echo("<font color='#0066CC'>[$row[opt2_name]]</font> $row[opts2_name]<br>");
						if($row[opt3_name])
							echo("<font color='#0066CC'>[$row[opt3_name]]</font> $row[opts3_name]<br>");
					echo("</td>
					<td align='center'><font color='686868'>$row[num14]</font></td>
					<td align='right'><font color='686868'>$f_price 원</font></td>
					<td align='right'><font color='686868'>$f_cash 원</font></td>
				</tr>
				<tr><td colspan='6' background='images/line_dot.gif'></td></tr>");
					}
				?>
				


			</table>

			<br><br><br>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title3.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<?
				$query="select * from jumun14 where no14=$no";
				$result=mysqli_query($db, $query);
				if(!$result) exit("$query");
				$row=mysqli_fetch_array($result);

				$o_tel1=trim(substr($row[o_tel14],0,3));
				$o_tel2=trim(substr($row[o_tel14],3,4));
				$o_tel3=trim(substr($row[o_tel14],7,4));
				$o_tel=sprintf("%3s-%4s-%4s",$o_tel1, $o_tel2, $o_tel3);
				$o_phone1=trim(substr($row[o_phone14],0,3));
				$o_phone2=trim(substr($row[o_phone14],3,4));
				$o_phone3=trim(substr($row[o_phone14],7,4));
				$o_phone=sprintf("%3s-%4s-%4s", $o_phone1, $o_phone2, $o_phone3);

				$r_tel1=trim(substr($row[r_tel14],0,3));
				$r_tel2=trim(substr($row[r_tel14],3,4));
				$r_tel3=trim(substr($row[r_tel14],7,4));
				$r_tel=sprintf("%3s-%4s-%4s",$r_tel1, $r_tel2, $r_tel3);
				$r_phone1=trim(substr($row[r_phone14],0,3));
				$r_phone2=trim(substr($row[r_phone14],3,4));
				$r_phone3=trim(substr($row[r_phone14],7,4));
				$r_phone=sprintf("%3s-%4s-%4s", $r_phone1, $r_phone2, $r_phone3);

				if($row[pay_method14]==0) $pay_method="카드";
				else $pay_method="무통장";
				
				if($row[card_halbu14]==0) $card_halbu="일시불";
				else $card_halbu=$row[card_halbu14]."개월";

				$card_kind = $row[card_kind14];
				$bank_kind = $row[bank_kind14];
				$f_total_cash=number_format($row[total_cash14]);
			?>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$row[no14]?><font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제금액</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#D06404"><b><?=$f_total_cash?> 원</b></font></td>
				</tr>
				<?
					if($row[pay_method14] == 0) {
						echo("<tr height='25'>
					<td width='100' bgcolor='#F2F2F2'>&nbsp;결제방식</td>
					<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$pay_method</font></td>
					<td width='100' bgcolor='#F2F2F2'>&nbsp;승인번호</td>
					<td width='243' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$row[card_okno14]</font></td>
				</tr>
				<tr height='25'>
					<td width='100' bgcolor='#F2F2F2'>&nbsp;카드종류</td>
					<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$a_card[$card_kind]</font></td>
					<td width='100' bgcolor='#F2F2F2'>&nbsp;할부</td>
					<td width='243' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$card_halbu</font></td>
				</tr>");
					}
					else if($row[pay_method14] == 1) {
						echo("<tr height='25'>
					<td width='100' bgcolor='#F2F2F2'>&nbsp;결제방식</td>
					<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$pay_method ($a_bank[$bank_kind])</font></td>
					<td width='100' bgcolor='#F2F2F2'>&nbsp;보낸사람</td>
					<td width='243' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$row[bank_sender14]</font></td>
				</tr>");
					}
				?>				
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<br><br><br>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title4.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문자명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row[o_name14]?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$o_tel?></font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$o_phone?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;이메일</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row[o_email14]?></font></td>
				</tr>
				<tr><td height="1" bgcolor="8B9CBF" colspan="4"></td></tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;수취인명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row[r_name14]?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$r_tel?></font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$r_phone?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;배달주소</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868">[<?=$row[r_zip14]?>]&nbsp;<?=$row[r_juso14]?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;메모</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row[memo14]?></font></td>
				</tr>
				
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td height="40" class="cmfont" align="right">
						<img src="images/b_list.gif" border="0" OnClick="location.href='jumun.php?page=1'" style="cursor:hand">&nbsp;&nbsp;&nbsp
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