<?php

// 세션 시작
session_start();

if(!isset($_SESSION['id'])){
    echo "<script>alert('로그인 후 이용해주세요.'); location.href='login.php';</script>";
    exit;
}
if($shop_logon[0] != 'admin'){
    echo "<script>alert('관리자만 접근 가능합니다.'); location.href='index.php';</script>";
    exit;
} else { ?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>구매관리</title>
</head>
<body>
  <h2>구매관리</h2>

  <table>
    <tr>
      <td colspan="7">
        <form name="search_form" action="admin_buy.php" method="post">
          <select name="search_item">
            <option value="buy_date">날짜</option>
            <option value="mem_id">아이디</option>
            <option value="goods_name">상품명</option>
            <option value="buy_state">진행상황</option>
          </select>
          <input type="text" name="search_text" placeholder="찾을 내용을 입력해주세요.">
          <input type="submit" value="검색">
      </form>
      </td>
    </tr>
    <tr>
      <td>날짜</td>
      <td>아이디</td>
      <td>상품명</td>
      <td>가격</td>
      <td>수량</td>
      <td>진행사항</td>
      <td>처리</td>
    </tr>
  <?php

  // DB 연결
  include "dbconn.php";

  // 검색조건에 따른 질의을 선택한다.
  if((trim($search_item) == '') || (trim($search_text) == '')){
    $query = "SELECT * FROM buy_tab ORDER BY buy_date DESC mem_id asc";
  } else {
    $query = "SELECT * FROM buy_tab WHERE $search_item LIKE '%$search_text%' ORDER BY buy_date DESC mem_id asc";
  }

  $result = mysqli_query($conn, $query);

  #---- 페이지를 나타내기 위한 변수 ----#
  $total_row = mysqli_num_rows($result); // 전체 레코드 수
  $page_line = 5;
  $link_num = 2;
  $total_page = (int)(($total_row - 1) / $pafe_line) + 1; // 전체 페이지 수

  #---- 검색된 것이 있으면 화면에 보여줄 것 선택 ----#
  if($total_row > 0 ){
    if(($page_num == "") || ($page_num < 1) || ($page_num > $total_page))
      $page_num = 1;

      $go_page = ($page_num - 1) * $page_line;

      $i = 0;
      mysqli_data_seek($result, $go_page); // 검색된 레코드 중에서 $go_page번째 레코드로 이동
  }

  #---- 검색된 상품이 존재한다면 화면에 보여준다. ----#
  while ($row = mysqli_fetch_row($result){
  #---- 한 페이지에 들어갈 것만 선택 ----#
  if($i >= $page_line)
  })


  ?>
  </table>
</body>
</html>
