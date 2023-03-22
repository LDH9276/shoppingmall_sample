<?php

  #---- 세션 시작 ----#
  session_start();
  if(!isset($_SESSION['id'])){
    exit;
  }
  if($shop_logon[0] != 'admin'){
    echo ("
      <script>
        window.alert('로그인해주세요.'); 
        location.href='index.php';
      </script>
    ");
    exit;
} else { 
  #---- 관리자만이 들어올 수 있는 페이지입니다 ----#  
?>

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
      <td colspan = "7">
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

  #---- 데이터베이스 연결 ----#
  include "lib.php";

  #---- 검색조건에 따른 질의를 선택합니다 ----#
  if((trim($search_item) == '') || (trim($search_text) == ''))
    $query = "SELECT * FROM buy_tab ORDER BY buy_date DESC mem_id asc";
  else
    $query = "SELECT * FROM buy_tab WHERE $search_item LIKE '%$search_text%' ORDER BY buy_date DESC mem_id asc";

  $result = mysqli_query($conn, $query);

  #---- 페이지를 나타내기 위한 환경변수 ----#
  $total_row = mysqli_num_rows($result); # 검색된 총 개수
  $page_line = 5; #페이지당 보여줄 개수
  $link_num = 2; #현재 페이지를 기준으로 좌우에 몇개를 보여줄지
  $total_page = (int)(($total_row - 1) / $pafe_line) + 1; # 전체 페이지 수

  #---- 검색된 것이 있으면 화면에 보여줄 것 선택 ----#
  if($total_row > 0 ){
    if(($page_num == "") || ($page_num < 1) || ($page_num > $total_page))
      $page_num = 1;

    $go_page = ($page_num - 1) * $page_line;

    $i = 0;
    mysqli_data_seek($result, $go_page); // 검색된 레코드 중에서 $go_page번째 레코드로 이동
  }

  #---- 검색된 상품이 존재한다면 화면에 보여준다. ----#
  while ($row = mysqli_fetch_row($result)){
    #---- 한 페이지에 들어갈 것만 선택 ----#
    if($i >= $page_line)
      break;
    $i++;
  ?>
    <form name="update_form" method="post" action="./admin_buy_update.php?buy_id=<?=$row[0]?>">
    <tr>
      <td><?=$row[5]?></td>
      <td><?=$row[2]?></td>
      <td><?=$row[7]?></td>
      <td><?=$row[3]?></td>
      <td><?=$row[6]?></td>
      <td>
        <select name="buy_state">
    <?php
    #---- 배송정보를 화면에 보여주는 루틴 ----#

    if($row[4] == "구매요청")
      echo "<option value='구매요청' selected>구매요청</option>";
    else
      echo "<option value='구매요청'>구매요청</option>";
    if($row[4] == "처리중")
      echo "<option value='처리중' selected>처리중</option>";
    else
      echo "<option value='처리중'>처리중</option>";
    if($row[4] == "배송중")
      echo "<option value='배송중' selected>배송중</option>";
    else
      echo "<option value='배송중'>배송중</option>";
    if($row[4] == "배송완료")
      echo "<option value='배송완료' selected>배송완료</option>";
    else
      echo "<option value='배송완료'>배송완료</option>";
    ?>
        </select>
      </td>
      <td>
        <input type="submit" value="수정">
        <input type="button" name="delete" value="삭제" onclick="location.href='./admin_buy_delete.php?buy_id=<?=$row[0]?>'">
      </td>
    </tr>
  </form>
<?php
  }
?>
  <tr>
    <td colspan = "7">
      <?php
      #---- 페이지 링크에 대한 루틴 ----#
      if($total_row > 0){
        echo("<br><br><a href='./admin_buy.php?page_num=1&search_item=$search_item&search_text=$search_text'><<</a>&nbsp;&nbsp;");
        $i = $page_num + $link_num; - $i + 1;
        if($i < 1) {
          $j = $page_num + $link_num - $i + 1;
          if($j > $total_page)
            $j = $total_page;
          $i = 1;
      } else {
        $j = $page_num + $link_num;
        if($j > $total_page){
          $i = $i + $total_page - $j;
          if($i < 1)
            $i = 1;
          $j = $total_page;
        }
      }

      for($i; $i <= $j; $i++){
        if($i == $page_num)
          echo("<a href='./admin_buy.php?page_num=$i&search_item=$search_item&search_text=$search_text'><font color='red'><b>$i</b></font></a>&nbsp;&nbsp;");
        else
          echo("<a href='./admin_buy.php?page_num=$i&search_item=$search_item&search_text=$search_text'>$i</a>&nbsp;&nbsp;");
      }
      echo ("<a href='./admin_buy.php?page_num=$total_page&search_item=$search_item&search_text=$search_text'>>></a>");
      }
      ?>
    </td>
  </tr>
  </table>
</body>
</html>
<?php
  }
?>
