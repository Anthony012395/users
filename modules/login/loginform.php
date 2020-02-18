<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container border mt-5 shadow">
        <div class="page-header display-4">LOGIN</div>
        <hr />
                <form action="modules/login/logincheck.php" method="POST">
                    <div class="row mt-2">
                        <div class="col">
                            Username: <input type="text" name="username" id="username" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            Password: <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                                      <input type="submit" name="submit" id="submit" class="btn btn-block btn-primary" value="LOGIN">
                        </div>
                    </div>
                    <div class="row mt-4"></div>

                </form>
    </div>
</body>
</html>