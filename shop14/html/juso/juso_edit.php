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

<?
	$query="select * from juso14 where no14=$no;";
	$result=mysqli_query($db, $query);
	if(!$result) exit("쿼리에러");
	$row=mysqli_fetch_array($result);
	if($row[sm14]==0) $sm="양력";
	else $sm="음력";
	$tel1=trim(substr($row[tel14],0,3));
	$tel2=trim(substr($row[tel14],3,4));
	$tel3=trim(substr($row[tel14],7,4));
	$birthday1=substr($row[birthday14],0,4);
	$birthday2=substr($row[birthday14],5,2);
	$birthday3=substr($row[birthday14],8,2);
?>

<form name="form1" method="post" action="juso_update.php">

<input type="hidden" name="no" value="<?=$no?>">

<table width="500" border="1" cellpadding="2" bgcolor="lightyellow" style="border-collapse:collapse">
  <tr>
    <td width="100" align="center" bgcolor="lightblue">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name14]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">전화</td>
    <td width="400" align="left">
      <input type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1?>"> -
      <input type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2?>"> -
      <input type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">생일</td>
    <td width="400" align="left">
      <input type="text" name="birthday1" size="4" maxlength="4" value="<?=$birthday1?>"> -
      <input type="text" name="birthday2" size="2" maxlength="2" value="<?=$birthday2?>"> -
      <input type="text" name="birthday3" size="2" maxlength="2" value="<?=$birthday3?>"> 
			&nbsp;&nbsp 
      <?
	  if ($row[sm14]==0) 
          echo("<input type='radio' name='sm' value='0' checked>양력
                   <input type='radio' name='sm' value='1'>음력");
       else
          echo("<input type='radio' name='sm' value='0' >양력
                   <input type='radio' name='sm' value='1' checked>음력");
	  ?>
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">주소</td>
    <td width="400" align="left">
      <input type="text" name="juso" size="40" value="<?=$row[juso14]?>">
    </td>
  </tr>
</table>
<br>
<table width="500" border="0">
  <tr>
    <td align="center"> 
			<input type="submit" value="수정"> &nbsp
			<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>