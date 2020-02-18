<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
        session_start();

        if(!isset($_SESSION['userid']) && !isset($_SESSION['username'])){

            header  ('Location: index.php');
            exit;

        }else{

            if(isset($_SESSION['usertype']) && isset($_SESSION['usertypeid'])){

                if($_SESSION['usertypeid'] == 5){
                    include_once    "header.php";
                    include_once    "alerts.php";
                    include_once    "modules/user/usertable.php";
                    include_once    "modules/user/adduserform.php";

                }else{

                    include_once    "header.php";
                    include_once    "modules/user/usertable.php";
                    exit;

                }


            }else{

            header  ('Location: index.php');
            exit;

            }

        }

    ?>
    <script src =   "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>
        <script>
            $(document).on('click','.deleteuser',function(){
                    var value = $(this).attr('value');
                    $.ajax({
                        url: 'modules/user/deleteuser.php',
                        method : "POST",
                        data: {'userid': value},
                        success : function(result) {
                            $("#userstable").load(location.href + " #userstable");
                        }
                    })
            });

        </script>
</body>
</html>