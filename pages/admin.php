<?php
if (!isset($_SESSION["user_idx"])) {
    echo "
    <script>
    alert('로그인 후 이용 가능합니다.')
    location.href = 'login';
    </script>
    ";
} else {
    if (($_SESSION["is_admin"] == 0)) {
        echo "
        <script>
        alert('관리자만 사용가능합니다.')
        location.href = '/';
        </script>
        ";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE `posts` SET `is_deleted` = '1' WHERE post_idx = :post_idx";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':post_idx', $_POST["post_idx"]);
    $stmt->execute();
}

$sql = "SELECT * FROM posts WHERE is_deleted = 0 ORDER BY write_date DESC ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $delete = $post["post_idx"];
//     $updatesql = "UPDATE `posts` SET `is_deleted` = '1' WHERE post_idx = :post_idx";
//     $upstmt = $pdo->prepare($updatesql);
//     $upstmt->bindParam(":post_idx", $delete);
//     $upstmt->execute();
//     $upuser = $upstmt->fetch(PDO::FETCH_ASSOC);
// }


?>
<h1>관리자 페이지 입니다.</h1>

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
            $divinnertext .= "<h2>" . $post["title"] . "</h2>";
            $divinnertext .= "<p> 작성자 : " . $user["username"] . "</p>";
            $divinnertext .= "<p> 게시글 ID: " . $post["post_idx"] . "</p>";
            $divinnertext .= "<p> 작성일: " . $post["write_date"] . "</p>";
            $divinnertext .= "<p>" . $post["content"] . "</p>";
            $divinnertext .= "<button id='" . $post["post_idx"] . "' onclick='postdelete(this);'>삭제버튼</button>";
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
                    location.href ='admin';
                },
                error: function() {
                    alert("에큥 실패★")
                }
            })
            // alert("지웠다 이 시발롬아 이제 속 시원하니?")
            // console.log("지울게용");
        } else {
            alert("시발련아 왜 안지움?")
            console.log("병신 쪼다 새끼 왜 지우다 마냐ㅋㅋ")
        }
        return console.log(elem)
    }
</script>