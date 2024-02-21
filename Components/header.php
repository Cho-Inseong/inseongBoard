<link rel="stylesheet" href="../css/header.css">
<header>
    <div id="left">
        <a href="/">
            <span id="headerTitle">투슬리스 보드</span>
        </a>
    </div>
    <div id="right">
        <ul>
            <?php
            if (isset($_SESSION["user_idx"])) {
                echo "
                <li><a href='logout'>로그아웃</a></li>
                ";
            }else {
                echo "
                <li><a href='login'>로그인</a></li>
                <li><a href='register'>회원가입</a></li>";
            }      
            ?>
        </ul>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var rainbowText = document.getElementById('headerTitle');
    var text = rainbowText.innerText;

    function updateRainbowText() {
        rainbowText.innerHTML = ""; // 기존 텍스트를 비웁니다.
        var colors = ['#FF0000', '#FF7F00', '#FFFF00', '#00FF00', '#0000FF', '#4B0082', '#9400D3']; // 무지개 색상
        for (let i = 0; i < text.length; i++) {
            let charElem = document.createElement('span');
            charElem.style.color = colors[(i + colorShift) % colors.length];
            charElem.textContent = text[i];
            rainbowText.appendChild(charElem);
        }
        colorShift = (colorShift + 1) % colors.length; // 색상 이동
    }

    let colorShift = 0;
    updateRainbowText(); // 초기 무지개 텍스트 설정
    setInterval(updateRainbowText, 100); // 1000ms(1초)마다 색상 변경
});
</script>