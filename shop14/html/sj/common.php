<?
	error_reporting(E_ALL & ~E_NOTICE);
	ini_set("display_error",1);
	$db = mysqli_connect ("localhost", "shop14", "1234", "shop14");
	if(!$db) exit("DB연결에러");

	$page_line=5;	//page 당 line 수
	$page_block=5; //block 당 page 수

	extract($_POST); // 실습용
	extract($_GET);
	extract($_FILES);
	extract($_COOKIE);
	extract($_SESSION);
	extract($_SERVER);
	extract($_ENV);

	/*
		동일한 변수명을 그대로 가져와서 쓰기 때문에 다른 웹페이지에서 가져올 수도 있다.
		글자가 깨져서 표시되는 것은 보통 이것 때문이다.

		내가 사용한 변수명을 가져와서 사용하려면
		$name = $_POST[name];
		$name = $_GET[name];
		위처럼 작성해야 하는데,
		POST방식을 사용했는지 GET방식을 사용했는지 파악해야 하는 번거로움이 있기 때문에
		$name = $_REQUEST[name];
		REQUEST는 자동으로 어떤 방식을 사용해서 값을 넘기는지 체크하기 때문에 간단하게 쓸 수 있다.
?>