<?
	$name=$_REQUEST[name];
	$num=$_REQUEST[num];
	$n_data=$_COOKIE[n_data];
	$data=$_COOKIE[data];
	
	if(!$n_data) $n_data=0;
	
	$n_data++;
	$data[$n_data] = implode("^^", array($n_data, $name, $num));
	setcookie("n_data", $n_data);
	setcookie("data[$n_data]", $data[$n_data]);
?>
<script>location.href="cookie.php"</script>