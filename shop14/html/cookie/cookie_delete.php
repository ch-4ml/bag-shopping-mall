<?
	$no=$_REQUEST[no];
	$name=$_REQUEST[name];
	$num=$_REQUEST[num];
	$n_data=$_COOKIE[n_data];
	$data=$_COOKIE[data];

	setcookie("data[$no]", "");
?>
<script>location.href="cookie.php"</script>