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
<style>
  body {
    background-color: aqua;
  }
</style>

<div class="container">
    <h1></h1>
    <form action="" method="post">
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
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">이메일</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputPassword3" name="email">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">전화번호</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="inputPassword3" name="phone_naumber">
          </div>
        </div>
        <fieldset class="row mb-3">
          <legend class="col-form-label col-sm-2 pt-0">성별</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" id="gridRadios1" value="man" name="gender">
              <label class="form-check-label" for="gridRadios1">
                남성
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="gridRadios2" value="woman" name="gender">
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
        <button type="button" class="btn btn-primary"><a href="login">로그인</a></button>
      </form>
</div>