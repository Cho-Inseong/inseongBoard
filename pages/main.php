<?php
if (isset($_SESSION['user_idx'])) {
    echo($_SESSION["user_idx"]);
    echo "로그인 됨";
} else {
    echo "로그인 안됨";
}


?>
<h1>메인이다 병신아ㅋ</h1>
<a href="register">회원가입</a>
<a href="login">로그인</a>
<a href="postpage">게시글</a>
<form method="post">
    <button id="logout" name="logout" type="submit"><a href="logout">로그아웃</a></button>
</form>

