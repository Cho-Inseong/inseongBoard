<?php
$sql = "SELECT * FROM posts WHERE is_deleted = 0 ORDER BY write_date DESC ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE `posts` SET `is_deleted` = '1' WHERE post_idx = :post_idx";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':post_idx', $_POST["post_idx"]);
    $stmt->execute();
}

?>

<div class="container mt-5">
    <h1>게시글 목록</h1>
    <?php
        if ($posts) {
            foreach ($posts as $post) {
                $sql = "SELECT * FROM users WHERE user_idx = :user_idx";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":user_idx", $post["user_idx"]);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $divinnertext = "";
                $divinnertext .= "<div class = 'post'>";
                $divinnertext .= "<h2>" . $post["title"]. "</h2>";
                $divinnertext .= "<p> 작성자 : " . $user["username"] . "</p>";
                $divinnertext .= "<p> 게시글 ID: " . $post["post_idx"] . "</p>";
                $divinnertext .= "<p> 작성일: " . $post["write_date"] . "</p>";
                $divinnertext .= "<p>" . $post["content"] . "</p>";
                if ($_SESSION["user_idx"] == $post["user_idx"]) {
                    $divinnertext .= "<button><a href='correction?post_idx=". $post["post_idx"] ."'>수정버튼</a></button>";
                    $divinnertext .= "<button id='" . $post["post_idx"] . "' onclick='postdelete(this);'>삭제버튼</button>";
                };
                $divinnertext .= "</div>";
                echo $divinnertext;
            }
        }    
    ?>
</div>

<script>
    function postdelete(elem) {
        const post_idx = elem.id;
        const isConfirm =  confirm(`정말로 ${post_idx}번 게시글을 삭제하시겠습니까?`);
        if (isConfirm) {
            $.ajax({
                url:'admin',
                type: 'POST',
                data: {"post_idx": post_idx},
                success: function() {
                    alert("정삭적으로 삭제했다잉");
                    location.href ='postpage';
                },
                error: function() {
                    alert("에큥 실패★")
                }
            })
        } else {
            alert("삭제가 취소되었습니다.")
        }
        return console.log(elem)
    }
</script>
