<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            height: 1000px;
        }
    </style>
</head>
<body>
    <div class="container2">
        <div class="container">
            <h1>새 글 작성</h1>
            <form action="">
                <input placeholder="제목" class="title" type="text">
                <input placeholder="내용" class="detail" type="text">
            </form>
        </div>
    </div>
</body>
</html>