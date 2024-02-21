<?php
if (isset($_SESSION['user_idx'])) {
    echo($_SESSION["user_idx"]);
    echo "로그인 됨";
} else {
    echo "로그인 안됨";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            background: url("./toothless.gif");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <h1>메인이다 병신아ㅋ</h1>
    <a href="register">회원가입</a>
    <a href="login">로그인</a>
    <a href="postpage">게시글</a>
    <form method="post">
        <button id="logout" name="logout" type="submit"><a href="logout">로그아웃</a></button>
    </form>
</body>
</html>

