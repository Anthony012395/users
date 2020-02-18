<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
        <nav class="navbar navbar-expand-sm bg-info navbar-white fixed-top text-right">
            <span class="navbar-text text-white">
                Hello  <?php   echo ucwords($_SESSION['username'])   ?>!
            </span>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-1">
                    <a href="" class="btn btn-warning text-white"><i class="fas fa-sync-alt"></i></a>
                </li>
                <li class="nav-item">
                    <a href="modules/login/logout.php" class="btn btn-warning text-white">LOGOUT</a>
                </li>
            </ul>
        </nav>   
        <div class="row mt-5"></div>
</body>
</html>