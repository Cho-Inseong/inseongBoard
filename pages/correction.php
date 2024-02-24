<?php
parse_str($path[1], $output);
$post_idx =  $output["post_idx"];


$sql = "SELECT title, content FROM posts WHERE post_idx = :post_idx";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":post_idx", $post_idx);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    try{
      $sql = "UPDATE posts SET title = '$title', content = '$content' WHERE post_idx = :post_idx";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":post_idx", $post_idx);
      $stmt->execute();
      echo "
      <script>
      alert('게시글 수정 완료.')
      location.href = 'postpage';
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
        <h1>게시글 수정</h1>
        <form action="" method="post">
            <input placeholder="제목" name="title" class="title" type="text" value="<?=$user['title']?>">
            <input placeholder="내용" name="content" class="detail" type="text" value="<?=$user['content']?>">
            <button type="submit">게시글 수정</button>
        </form>
    </div>
</div>