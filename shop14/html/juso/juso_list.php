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
	<title>주소록 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="600" border="0">
	<form name="form1" method="post" action="juso_list.php">
		<tr>
			<td width="300">&nbsp
				이름 : <input type="text" name="text1" size="5" value="<?=$text1?>">
				<input type="button" value="검색" onClick="javascript:form1.submit();">
			</td>
			<td align="right"><a href="juso_new.html">입력</a></td>
		</tr>
	</form>
</table>

<table width="600" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="70"  align="center">이름</td>
    <td width="100"  align="center">전화</td>
    <td width="50"  align="center">음/양</td>
    <td width="80"  align="center">생일</td>
    <td width="250" align="center">주소</td>
    <td width="50"  align="center">삭제</td>
  </tr>
  <?
    if(!$text1)
		$query="select * from juso14 order by name14;";
	else
	{
		$query="select * from juso14 where name14 like '$text1%' order by name14;";
	}
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러 : $query");
	$count=mysqli_num_rows($result); // 전체 레코드 개수

	if(!$page) $page=1;
	$pages=ceil($count/$page_line); // 전체 페이지 수

	$first=1;
	if($count>0) $first=$page_line*($page-1);

	$page_last=$count-$first;
	if($page_last>$page_line) $page_last=$page_line;

	if($count>0) mysqli_data_seek($result, $first);
	for($i=0; $i<$page_last; $i++)
	{
		$row=mysqli_fetch_array($result);
		if($row[sm14]==0) $sm="양력";
		else $sm="음력";
		$tel1=trim(substr($row[tel14],0,3));
		$tel2=trim(substr($row[tel14],3,4));
		$tel3=trim(substr($row[tel14],7,4));
		$tel=sprintf("%3s-%4s-%4s",$tel1, $tel2, $tel3);
		$birthday1=substr($row[birthday14],0,4);
		$birthday2=substr($row[birthday14],5,2);
		$birthday3=substr($row[birthday14],8,2);
		$birthday=sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
		echo("<tr bgcolor='lightyellow'>
				<td width='70'  align='center'><a href='juso_edit.php?no=$row[no14]'>$row[name14]</a></td>
				<td width='110'  align='center'>$tel</td>
				<td width='50'  align='center'>$sm</td>
				<td width='80'  align='center'>$birthday</td>
				<td width='250' align='left'>$row[juso14]</td>
				<td width='50'  align='center'>
				<a href='juso_delete.php?no=$row[no14]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
				</td>
			</tr>");
	}
  ?>
  
</table>

<table border="0" cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td height='40' align='center'>
		<?
			$blocks = ceil($pages/$page_block); // 전체 블록 수 = 전체 페이지 / 블록 당 페이지 수
			$block = ceil($page/$page_block); // 현재 블록 = 현재 페이지 / 블록당 페이지 수
			$page_s = $page_block*($block-1); // 표시해야 할 시작 페이지 번호 - 1 값
			$page_e = $page_block*$block; // 표시해야 할 마지막 페이지 번호
			if($blocks <= $block) $page_e = $pages;
			if($block>1)
			{
				$prev = $page_s;
				echo("<a href='juso_list.php?page=$prev & text1=$text1'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'></a> &nbsp;");
			}
			for($i=$page_s+1; $i<=$page_e; $i++)
			{
				if($i==$page)echo("[<font color='red'><b>$i</b></font>]");
				else echo("<a href='juso_list.php?page=$i & text1=$text1'>[$i]</a>");
				
			}
			if($block<$blocks)
			{
				$next = $page_e+1;
				echo("<a href='juso_list.php?page=$next & text1=$text1'>
				<img src='images/i_next.gif' align='absmiddle' border='0'></a>");
			}
		?>
		</td>
	</tr>
</table>

</body>
</html>
