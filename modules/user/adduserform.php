<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container shadow">
        <div class="row mt-5"></div>
        <div class="page-header display-4">ADD NEW USER</div>
        <hr />
        <form action="modules/user/adduser.php" method="POST">
            <div class="row mt-2">
                <div class="col">
                    <input type="text"      name="username" id="username" placeholder="username" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <input type="password"  name="password" id="password" placeholder="password" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <input type="text"      name="userid"   id="userid"   placeholder="userid"  class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <select name="usertypeid" id="usertypeid" class="btn btn-block btn-primary" data-toggle="dropdown">
                        <option value="1">User</option>
                        <option value="5">Admin</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                        <input type="submit" id="submit" name="submit" class="btn btn-block btn-success" value="ADD">
                </div>
            </div>
        </form>
        <div class="row mt-3"></div>
    </div>
</body>
</html>