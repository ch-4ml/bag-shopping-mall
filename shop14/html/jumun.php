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
				<tr><td height="20"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title1.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td colspan="5" height="3" bgcolor="#0066CC"></td></tr>
				<tr bgcolor="F2F2F2">
					<td width="80" height="30" align="center">주문일</td>
					<td width="100"  align="center">주문번호</td>
					<td width="290" align="center">제품명</td>
					<td width="100" align="center">금액</td>
					<td width="115" align="center">주문상태</td>
				</tr>
				<tr><td colspan="5" bgcolor="DEDCDD"></td></tr>
				<?
					if($cookie_no)
						$query="select * from jumun14 where member_no14=$cookie_no order by no14 desc";
					else
						$query="select * from jumun14 where o_name14='$name' and o_email14='$email' order by no14 desc";
					$result=mysqli_query($db, $query);
					if(!$result) exit("$query");
					$count=mysqli_num_rows($result);
					if(!$page) $page=1;
					$pages=ceil($count/$page_line); // 전체 페이지 수
					
					$first=1;
					if($count>0) $first=$page_line*($page-1);
					
					$page_last=$count-$first;
					if($page_last>$page_line) $page_last=$page_line;
					
					if($count>0) mysqli_data_seek($result, $first);

					for($i=0; $i<$page_last; $i++) {
					$row=mysqli_fetch_array($result);
					$f_total_cash=number_format($row[total_cash14]);
					echo("<tr>
						<td height='30' align='center'><font color='686868'>$row[jumunday14]</font></td>
						<td align='center'>
							<a href='jumun_info.php?no=$row[no14]&page=$i'><font color='#0066CC'>$row[no14]</font></a>
						</td>
						<td><font color='686868'>$row[product_names14]</font></td>
						<td align='right'><font color='686868'>$f_total_cash 원</font></td>
						<td align='center'><font color='#0066CC'>$row[state14]</font></td>
					</tr>
					<tr><td colspan='5' background='images/line_dot.gif'></td></tr>
					");
					}
				?>
				<tr><td colspan="5" height="2" bgcolor="#0066CC"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
			<tr>
				<td height="30" align="center" class="cmfont">
				<?
					$blocks = ceil($pages/$page_block); // 전체 블록 수 = 전체 페이지 / 블록 당 페이지 수
					$block = ceil($page/$page_block); // 현재 블록 = 현재 페이지 / 블록당 페이지 수
					$page_s = $page_block*($block-1); // 표시해야 할 시작 페이지 번호 - 1 값
					$page_e = $page_block*$block; // 표시해야 할 마지막 페이지 번호
					if($blocks <= $block) $page_e = $pages;
					if($block>1)
					{
						$prev = $page_s;
						echo("<a href='jumun.php?page=$prev'><font color='#7C7A77'>
						<img src='images/i_prev.gif' align='absmiddle' border='0'></a> &nbsp;");
					}
					for($i=$page_s+1; $i<=$page_e; $i++)
					{
						if($i==$page)echo("[<font color='red'><b>$i</b></font>]");
						else echo("<a href='jumun.php?page=$i'>[$i]</a>");
						
					}
					if($block<$blocks)
					{
						$next = $page_e+1;
						echo("<a href='jumun.php?page=$next'>
						<img src='images/i_next.gif' align='absmiddle' border='0'></a>");
					}
				?>
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