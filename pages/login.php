<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];
    $admin = $_post["is_admin"];

		$sql = "SELECT user_idx, password, is_admin FROM users WHERE username = :username ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":username", $username);

    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && ($password == $user['password'])) {
      $_SESSION["user_idx"] = $user["user_idx"];
      $_SESSION["is_admin"] = $user["is_admin"];
      header("Location: /");
      exit;
    } else {
      echo "아이디 또는 비밀번호가 잘못되었습니다.";
    }
	}
?>
<style>
  body {
    background-color: aqua;
  }
</style>

<div class="container">
    <h1></h1>
    <form action=" " method="post">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">아이디</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="username">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">비밀번호</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">로그인</button>
      </form>
</div>