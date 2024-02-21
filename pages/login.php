<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT user_idx, password FROM users WHERE username = :username ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":username", $username);

    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && ($password == $user['password'])) {
      $_SESSION["user_idx"] = $user["user_idx"];
      header("Location: /");
      exit;
    } else {
      echo "아이디 또는 비밀번호가 잘못되었습니다.";
    }

    

    // echo $result["password"];
    
		// $result = $conn->query($sql);
		// if ($result->num_rows > 0) {
    //   $row = $result->fetch_assoc();
    //   $userIDX = $row['user_idx'];

		// 	session_start();
		// 	$_SESSION["user_idx"] = $userIDX;
    //   echo $_SESSION["user_idx"];
		// 	header("location: /");
		// } else {
		// 	echo('<script>"아이디 또는 비밀번호가 잘못되었습니다."</script>');
		// }
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      body {
        background-color: aqua;
      }
    </style>
</head>
<body>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>