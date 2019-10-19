<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>
<?
	$query="select * from jumun14 where no14='$no';";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);
	
	$state=$row[state14];
	if($row[member_no14]==0) $member="비회원";
	else $member="회원";
	
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

	$f_baesongbi=number_format($baesongbi);
	$f_total_cash=number_format($row[total_cash14]);
?>
<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$row[no14]?> (<font color="blue"><?=$a_state[$state]?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[jumunday14]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_name14]?> (<?=$member?>)</td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_email14]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[o_zip14]?>) <?=$row[o_juso14]?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_name14]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_email14]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[r_zip14]?>) <?=$row[r_juso14]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row[memo14]?></td>
	</tr>
</table>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<?
		if($row[pay_method14] == 0) {
			echo("<tr> 
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>$pay_method</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$a_card[$card_kind]</td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드승인번호 </font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[card_okno14]&nbsp</td>
	</tr>
	<tr> 
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드 할부</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$card_halbu</td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드종류</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>개인</td>
	</tr>");
		}
		else if($row[pay_method14] == 1) {
			echo("<tr> 
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>$pay_method</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'><?=$a_bank[$bank_kind]?></td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>입금자이름</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'><?=$row[bank_sender14]?></td>
	</tr>");
		}
	?>

	
</table>

<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="30"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="40"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션3</font></td>
	</tr>
	<?
		$query="select product14.name14 as p_name, jumuns14.num14, jumuns14.price14, jumuns14.cash14, jumuns14.discount14, opts1.name14 as opts1_name, opts2.name14 as opts2_name, opts3.name14 as opts3_name from (((jumuns14 left join product14 on jumuns14.product_no14=product14.no14) left join opts14 as opts1 on jumuns14.opts_no1_14=opts1.no14) left join opts14 as opts2 on jumuns14.opts_no2_14=opts2.no14) left join opts14 as opts3 on jumuns14.opts_no3_14=opts3.no14 where jumuns14.jumun_no14='$no';";
		$result=mysqli_query($db, $query);
		if(!$result) exit("$query");
		$count=mysqli_num_rows($result);

		for($i=0;$i<$count;$i++) {
			$row1=mysqli_fetch_array($result);
			$f_price=number_format($row1[price14]);
			$f_cash=number_format($row1[cash14]);
			if($row1[p_name]=="") $p_name="배송비";
			else $p_name=$row1[p_name];
			echo("<tr bgcolor='#EEEEEE' height='20'>
		<td width='340' height='20' align='left'>$p_name</td>	
		<td width='30'  height='20' align='center'>$row1[num14]</td>	
		<td width='60'  height='20' align='right'>$f_price</td>	
		<td width='60'  height='20' align='right'>$f_cash</td>	
		<td width='40'  height='20' align='center'>$row1[discount14] %</td>	
		<td width='60'  height='20' align='center'>$row1[opts1_name]</td>	
		<td width='60'  height='20' align='center'>$row1[opts2_name]</td>
		<td width='60'  height='20' align='center'>$row1[opts3_name]</td>	
	</tr>");
		}
	?>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$f_total_cash?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
