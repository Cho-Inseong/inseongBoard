<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone_naumber = $_POST['phone_naumber'];
  $gender = $_POST['gender'];

  try{
    $sql = "INSERT INTO users (username, password, email, phone_number, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password, $email, $phone_naumber, $gender]);
    echo "회원가입이 성공적으로 완료되었습니다.";
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
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
</head>
<body>
    <div class="container">
        <h1></h1>
        <form>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">아이디</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">비밀번호</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">이메일</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">전화번호</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3">
              </div>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">성별</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  <label class="form-check-label" for="gridRadios1">
                    남성
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  <label class="form-check-label" for="gridRadios2">
                    여성
                  </label>
                </div>
              </div>
            </fieldset>
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
                <!-- <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                    Example checkbox
                  </label>
                </div> -->
              </div>
            </div>
            <button type="submit" class="btn btn-primary"> 회원가입</button>
          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>