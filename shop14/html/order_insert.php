<?
	include "common.php";

	$n_cart=$_COOKIE[n_cart];
	$cart=$_COOKIE[cart];
	$n_cart=$_COOKIE[n_cart];
	$cart=$_COOKIE[cart];

	$o_no=$_REQUEST[o_no];
	$o_name=$_REQUEST[o_name];
	$o_tel1=$_REQUEST[o_tel1];
	$o_tel2=$_REQUEST[o_tel2];
	$o_tel3=$_REQUEST[o_tel3];
	$o_phone1=$_REQUEST[o_phone1];
	$o_phone2=$_REQUEST[o_phone2];
	$o_phone3=$_REQUEST[o_phone3];
	$o_email=$_REQUEST[o_email];
	$o_zip=$_REQUEST[o_zip];
	$o_juso=$_REQUEST[o_juso];
	$memo=$_REQUEST[memo];

	$r_no=$_REQUEST[r_no];
	$r_name=$_REQUEST[r_name];
	$r_tel1=$_REQUEST[r_tel1];
	$r_tel2=$_REQUEST[r_tel2];
	$r_tel3=$_REQUEST[r_tel3];
	$r_phone1=$_REQUEST[r_phone1];
	$r_phone2=$_REQUEST[r_phone2];
	$r_phone3=$_REQUEST[r_phone3];
	$r_email=$_REQUEST[r_email];
	$r_zip=$_REQUEST[r_zip];
	$r_juso=$_REQUEST[r_juso];
	
	$pay_method=$_REQUEST[pay_method];
	$card_okno=0; // 카드 회사에서 return 해주는 부분
	$card_halbu=$_REQUEST[card_halbu];
	$card_kind=$_REQUEST[card_kind];
	$bank_kind=$_REQUEST[bank_kind];
	$bank_sender=$_REQUEST[bank_sender];

	$query="select no14 from jumun14 where jumunday14=curdate() order by no14 desc";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	$jumun_no=substr($row[no14],6,9);
	if($count>0)
	{
		$jumun_no = $jumun_no+1;
		$new_jumun_no=date("ymd").sprintf("%04d", $jumun_no);
	}
	else
		$new_jumun_no=date("ymd")."0001";

	$total_price=0;
	$product_nums=0;
	$product_names="";
	$jumunday=date("Ymd");
	for($i=1; $i<=$n_cart; $i++)
	{
		if($cart[$i])
		{
			list($no, $num, $opts1, $opts2, $opts3) = explode("^", $cart[$i]);
			$query="select * from product14 where no14=$no";
			$result=mysqli_query($db, $query);
			if(!$result) exit("$query");
			$row=mysqli_fetch_array($result);
			$product_no=$row[no14]; // $no와 동일한 값인 듯
			$product_price=$row[price14];
			$product_discount=$row[discount14];
			$discounted_price=$product_price * (100-$product_discount) / 100;
			$cash=$discounted_price * $num;
			$product_sale=$row[icon_sale14];

			$query="insert into jumuns14 (jumun_no14, product_no14, num14, price14, cash14, discount14, opts_no1_14, opts_no2_14, opts_no3_14) values ('$new_jumun_no', '$product_no', '$num', '$discounted_price', '$cash', '$product_discount', '$opts1', '$opts2', '$opts3');";
			$result=mysqli_query($db, $query);
			if(!$result) exit("$query");
			setcookie("cart[$i]", "");
			$total_price = $total_price + $cash;
			$product_nums = $product_nums + 1;
			if($product_nums==1) $product_names = $row[name14];
			
		}
	}

	if($product_nums>1)
	{
		$tmp=$product_nums;
		$product_names=$product_names."등 ".$tmp."종";
	}

	if($total_price<$max_baesongbi)
	{
		$query="insert into jumuns14 (jumun_no14, product_no14, num14, price14, cash14, discount14, opts_no1_14, opts_no2_14, opts_no3_14) values ('$new_jumun_no', 0, 1, '$baesongbi', '$baesongbi', 0, 0, 0, 0);";
		$result=mysqli_query($db, $query);
		if(!$result) exit("$query");
		$total_price = $total_price + $baesongbi;
	}
	
	if($cookie_no)
		$member_no=$cookie_no;
	else
		$member_no=0;

	$query="insert into jumun14 (no14, member_no14, jumunday14, product_names14, product_nums14, o_name14, o_tel14, o_phone14, o_email14, o_zip14, o_juso14, r_name14, r_tel14, r_phone14, r_email14, r_zip14, r_juso14, memo14, pay_method14, card_okno14, card_halbu14, card_kind14, bank_kind14, bank_sender14, total_cash14, state14) values ('$new_jumun_no', '$member_no', '$jumunday', '$product_names', '$product_nums', '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_juso', '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_juso', '$memo', '$pay_method', '$card_okno', '$card_halbu', '$card_kind', '$bank_kind', '$bank_sender', '$total_price', 1);";
	$result=mysqli_query($db, $query);
	if(!$result) exit("$query");

?>
<script>location.href="order_ok.html"</script>