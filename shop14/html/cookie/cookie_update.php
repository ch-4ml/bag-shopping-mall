<?
	$no=$_REQUEST[no];
	$name=$_REQUEST[name];
	$num=$_REQUEST[num];
	$n_data=$_COOKIE[n_data];
	$data=$_COOKIE[data];

	list($data_no, $data_name, $data_num) = explode("^^", $data[$no]);
	$data_name = $name;
	$data_num = $num;
	$data[$no] = implode("^^", array($data_no, $data_name, $data_num));
	setcookie("data[$no]", $data[$no]);
?>
<script>location.href="cookie.php"</script>