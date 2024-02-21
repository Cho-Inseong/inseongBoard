<link rel="stylesheet" href="../css/global.css">

<?php
include('./config/dbconnect.php');
session_start();
$request = $_SERVER['REQUEST_URI'];
$path = explode("?", $request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/", $path[0]);
echo "<script>console.log('path[0] = " . $path[0] . "');</script>";
echo "<script>console.log('path[1] = " . $path[1] . "');</script>";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Router</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $page = "";
    include('./Components/header.php');
    switch ($resource[1]) {
        case '':
            $page = "./pages/main.php";
            break;
        case 'login':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'register':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'postpage':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'newpost':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'logout':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        default:
            $page = "./pages/404.php";
            break;
    }
    include($page);
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</html>