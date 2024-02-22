<?php
if(!isset($_SESSION["user_idx"])) {
    echo "
    <script>
    alert('로그인 후 이용 가능합니다.')
    location.href = 'login';
    </script>
    ";
} else {
    if(($_SESSION["is_admin"] == 0)) {
        echo "
        <script>
        alert('관리자만 사용가능합니다.')
        location.href = '/';
        </script>
        ";
    }
}
?>
<h1>관리자 페이지 입니다.</h1>