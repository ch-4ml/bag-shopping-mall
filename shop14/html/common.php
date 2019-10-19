<?
	error_reporting(E_ALL & ~E_NOTICE);
	ini_set("display_error",1);
	$db = mysqli_connect ("localhost", "shop14", "knifeark7677", "shop14");
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
	*/

	$admin_id = "admin";
	$admin_pw = "1234";

	$a_idname=array("이름", "ID");
	$n_idname=count($a_idname);

	$a_menu=array("분류선택", "서류가방", "백팩", "크로스백", "숄더백", "웨이스트백", "힙색", "맨스백/클러치", "보스턴백/여행가방", "카메라가방");
	$n_menu=count($a_menu);

	$a_status=array("상품상태", "판매중", "판매중지", "품절");
	$n_status=count($a_status);

	$a_icon=array("아이콘","New","Hit","Sale");
	$n_icon=count($a_icon);

	$a_pnamecode=array("","제품이름", "제품번호");
	$n_pnamecode=count($a_pnamecode);

	$a_sort=array("new", "up", "down", "name");
	$a_sortname=array("신상품순 정렬", "고가격순 정렬", "저가격순 정렬", "상품명 정렬");
	$n_sort=count($a_sort);

	$baesongbi=2500;
	$max_baesongbi=100000;

	//////////////////////////////

	$a_state=array("전체", "주문신청", "주문확인", "입금확인", "배송중", "주문완료", "주문취소");
	$n_state=count($a_state);

	$a_search=array("", "주문번호", "주문자", "상품명");
	$n_search=count($a_search);

	$a_card=array("국민카드", "신한카드", "우리카드", "하나카드");
	$n_card=count($a_card);

	$a_bank=array("", "국민은행 000-00000-0000", "신한은행 000-00000-0000");
	$n_bank=count($a_bank);
?>