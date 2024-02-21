<?php
if(!isset($_SESSION["user_idx"])) {
    echo "
    <script>
    alert('로그인 후 이용 가능합니다.')
    location.href = 'login';
    </script>
    ";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userIDX = $_SESSION['user_idx'];
    try{
      $sql = "INSERT INTO posts (title, content, user_idx) VALUES (?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$title, $content, $userIDX]);
      echo "
      <script>
      alert('글 쓰기 완료')
      location.href = '/';
      </script>
      ";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
?>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }
    .container{
        width: 500px;
        flex-direction: column;
        text-align: center;
    }
    .container2{
        display: flex;
        justify-content: center;
    }
    .title {
        width: 200px;
        height: 30px;
    }
    .detail {
        width: 100%;
        height: 900px;
    }
</style>

<div class="container2">
    <div class="container">
        <h1>새 글 작성</h1>
        <form action="newpost" method="post">
            <input placeholder="제목" name="title" class="title" type="text">
            <input placeholder="내용" name="content" class="detail" type="text">
            <button type="submit">글 등록</button>
        </form>
    </div>
</div>
