
<?php

    if(isset($_SESSION['alerts'])){
        echo    '<div class="alert alert-info text-center mt-5 fixed-top">
                    <strong>'.$_SESSION['alerts'].'</strong>
                </div>';
        unset($_SESSION['alerts']);
    }

?>
