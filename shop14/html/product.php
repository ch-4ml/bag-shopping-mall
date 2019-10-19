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
	if(!$sort) $sort=0;
	if($sort==1)
		$tmp="price14 desc";
	else if($sort==2)
		$tmp="price14";
	else if($sort==3)
		$tmp="name14";
	else
		$tmp="no14 desc";

	$query="select * from product14 where menu14=$menu order by ".$tmp;
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$count=mysqli_num_rows($result);

	$num_col=5;
	$num_row=3;
	$page_line=$num_col*$num_row;

	if(!$page) $page=1;
	$pages=ceil($count/$page_line); // 전체 페이지 수
	
	$first=1;
	if($count>0) $first=$page_line*($page-1);
	
	$page_last=$count-$first;
	if($page_last>$page_line) $page_last=$page_line;
	
	if($count>0) mysqli_data_seek($result, $first);
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
			<form name="form2" method="post" action="product.php">
			<input type="hidden" name="menu" value="<?=$menu?>">
			<table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#777777">
				<tr>
					<td bgcolor="black" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
												<font color="ffffff" class="cmfont"><b><?=$a_menu[$menu]?> &nbsp</b></font>&nbsp
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="FFFFFF"><b><?=$count?></b> 개의 상품&nbsp;&nbsp;&nbsp</font></td>
														<td width="100">
															<select name="sort" size="1" class="cmfont" onChange="form2.submit()">
																<?
																	if(!$sort) $sort=0;
																	for($i=0;$i<$n_sort;$i++) 
																	{							
																		if($sort==$i)
																			echo("<option value='$i' selected>$a_sortname[$i]</option> ");
																		else
																			echo("<option value='$i'>$a_sortname[$i]</option>");
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

			<?
			echo("<table border='0' cellpadding='0' cellspacing='0'>");
			for($ir=0;$ir<$num_row;$ir++)
			{
				echo("<tr>");
				for($ic=0;$ic<$num_col;$ic++)
				{
					if($icount<$count)
					{
						$row=mysqli_fetch_array($result);
						$f_price=number_format($row[price14]);
						$d_price=number_format(round($row[price14]*(100-$row[discount14])/100, -3));
						echo("<td width='150' height='205' align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
									<tr>
										<td align='center'>
											<a href='product_detail.php?no=$row[no14]'><img src='product/$row[image1_14]' width='120' height='140' border='0'></a>
										</td>
									</tr>
									<tr><td height='5'></td><tr>
									<tr>
										<td height='20' align='center'>
											<a href='product_detail.php?no=$row[no14]'><font color='ffffff'>$row[name14]</font></a>");
											if($row[icon_new14]==1)
												echo(" <img src='images/i_new.gif' align='absmiddle' vspace='1'>");
											if($row[icon_hit14]==1)
												echo(" <img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
											if($row[icon_sale14]==1)
												echo(" <img src='images/i_sale.gif' align='absmiddle' vspace='1'> <font color='red'>$row[discount14]%</font>");
										echo("</td>
									</tr>");
									if($row[icon_sale14]==1) {
										echo("<tr><td height='20' align='center'><font color='#f7f7f7'><strike>$f_price 원</strike></font><br><font color='#ffffff'><b>$d_price 원</b></font></td></tr>");
									}
									else
										echo("<tr><td height='20' align='center'><font color='#ffffff'<b>$f_price 원</b></font></td></tr>");
									echo("</table>
									</td>");
									
					}
					else
						echo("<td></td>");
					$icount++;
				}
				echo("</tr>");
			}
			echo("</table>");
		?>
			<table width="800" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td height="30" class="cmfont" align="center">
					<?
						$blocks = ceil($pages/$page_block); // 전체 블록 수 = 전체 페이지 / 블록 당 페이지 수
						$block = ceil($page/$page_block); // 현재 블록 = 현재 페이지 / 블록당 페이지 수
						$page_s = $page_block*($block-1); // 표시해야 할 시작 페이지 번호 - 1 값
						$page_e = $page_block*$block; // 표시해야 할 마지막 페이지 번호
						if($blocks <= $block) $page_e = $pages;
						if($block>1)
						{
							$prev = $page_s;
							echo("<a href='product.php?page=$prev&findtext=$findtext&menu=$menu&sort=$sort'>
							<img src='images/i_prev.gif' align='absmiddle' border='0'></a> &nbsp;");
						}
						for($i=$page_s+1; $i<=$page_e; $i++)
						{
							if($i==$page)echo("[<font color='red'><b>$i</b></font>]");
							else echo("<a href='product.php?page=$i&findtext=$findtext&menu=$menu&sort=$sort'>[$i]</a>");
							
						}
						if($block<$blocks)
						{
							$next = $page_e+1;
							echo("<a href='member.php?page=$next&findtext=$findtext&menu=$menu&sort=$sort'>
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