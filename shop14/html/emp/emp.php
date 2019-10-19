<?
	include "../common.php";
?>
<html>
<head>
	<title>직원 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>
<body>
<?
	if(!$text1)
		$query="select * from emp14 order by name14;";
	else
		$query="select * from emp14 where name14 like '%$text1%' order by name14;";
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
?>
<table width="500" border="0">
	<form name="form1" method="post" action="emp.php">
	<tr>
		<td width="300">
			이름 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="emp_new.php">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">이름</td>
    <td width="100" align="center">전화</td>
    <td width="100" align="center">수정 / 삭제</td>
    <td width="100" align="center">가족</td>
  </tr>
<?
	for($i=0;$i<$page_last;$i++) {
		$row=mysqli_fetch_array($result);
		$tel1=trim(substr($row[tel14],0,3));
		$tel2=trim(substr($row[tel14],3,4));
		$tel3=trim(substr($row[tel14],7,4));
		$tel=sprintf("%3s-%4s-%4s",$tel1, $tel2, $tel3);
		  echo("<tr bgcolor='lightyellow'>
			<td width='100' align='center'>$row[name14]</td>
			<td width='100' align='center'>$tel</td>
			<td width='100' align='center'>
				<a href='emp_edit.php?no1=$row[no14]'>수정</a> / 
				<a href='emp_delete.php?no1=$row[no14]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
			</td>
			<td width='100' align='center'>
				<a href='emps.php?no1=$row[no14]'>가족편집</a>
			</td>
		  </tr>");
	}
?>
</table>
<table width="500" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="40" align="center">
		<?
			$blocks = ceil($pages/$page_block); // 전체 블록 수 = 전체 페이지 / 블록 당 페이지 수
			$block = ceil($page/$page_block); // 현재 블록 = 현재 페이지 / 블록당 페이지 수
			$page_s = $page_block*($block-1); // 표시해야 할 시작 페이지 번호 - 1 값
			$page_e = $page_block*$block; // 표시해야 할 마지막 페이지 번호
			if($blocks <= $block) $page_e = $pages;
			if($block>1)
			{
				$prev = $page_s;
				echo("<a href='emp.php?page=$prev&text1=$text1'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'></a> &nbsp;");
			}
			for($i=$page_s+1; $i<=$page_e; $i++)
			{
				if($i==$page)echo("[<font color='red'><b>$i</b></font>]");
				else echo("<a href='emp.php?page=$i&text1=$text1'>[$i]</a>");
				
			}
			if($block<$blocks)
			{
				$next = $page_e+1;
				echo("<a href='emp.php?page=$next&text1=$text1'>
				<img src='images/i_next.gif' align='absmiddle' border='0'></a>");
			}
		?>
		</td>
	</tr>
</table>
</body>
</html>
