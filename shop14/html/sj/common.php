<?
	error_reporting(E_ALL & ~E_NOTICE);
	ini_set("display_error",1);
	$db = mysqli_connect ("localhost", "shop14", "1234", "shop14");
	if(!$db) exit("DB���ῡ��");

	$page_line=5;	//page �� line ��
	$page_block=5; //block �� page ��

	extract($_POST); // �ǽ���
	extract($_GET);
	extract($_FILES);
	extract($_COOKIE);
	extract($_SESSION);
	extract($_SERVER);
	extract($_ENV);

	/*
		������ �������� �״�� �����ͼ� ���� ������ �ٸ� ������������ ������ ���� �ִ�.
		���ڰ� ������ ǥ�õǴ� ���� ���� �̰� �����̴�.

		���� ����� �������� �����ͼ� ����Ϸ���
		$name = $_POST[name];
		$name = $_GET[name];
		��ó�� �ۼ��ؾ� �ϴµ�,
		POST����� ����ߴ��� GET����� ����ߴ��� �ľ��ؾ� �ϴ� ���ŷο��� �ֱ� ������
		$name = $_REQUEST[name];
		REQUEST�� �ڵ����� � ����� ����ؼ� ���� �ѱ���� üũ�ϱ� ������ �����ϰ� �� �� �ִ�.
?>