<?
	include "common.php";
	
	$no = $_REQUEST[no];
	$num = $_REQUEST[num];
	$opts1 = $_REQUEST[opts1];
	$opts2 = $_REQUEST[opts2];
	$opts3 = $_REQUEST[opts3];
	$pos = $_REQUEST[pos];
	
	$n_cart=$_COOKIE[n_cart];
	$cart=$_COOKIE[cart];
	
	if(!$n_cart) $n_cart=0;
	
	switch($kind) {
		case "insert"	:
		case "order"	:
			$n_cart++;
			$cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2, $opts3));
			setcookie("n_cart", $n_cart);
			setcookie("cart[$n_cart]", $cart[$n_cart]);
			break;
		case "update"	:
			list($no, $nums, $opts1, $opts2, $opts3) = explode("^", $cart[$pos]);
			$nums = $num;
			$cart[$pos] = implode("^", array($no, $num, $opts1, $opts2, $opts3));
			setcookie("cart[$pos]", $cart[$pos]);
			break;
		case "delete"	:
		case "deleteInOrder"	:
			setcookie("cart[$pos]", "");
			break;
		case "deleteall":
			for($i=1;$i<=$n_cart;$i++){
			if($cart[$i])
				setcookie("cart[$i]","");
			}
			setcookie("n_cart","");
			break;
	}
			//exit("no : $no, num : $num, opts1 : $opts1, opts2 : $opts2, opts3 : $opts3, n_cart : $n_cart, cart : $cart");
	if($kind=="order" || $kind=="deleteInOrder")
		echo("<script>location.href='order.php'</script>");
	else
		echo("<script>location.href='cart.php'</script>");
?>