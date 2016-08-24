<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="container">
                <a href="/">Uploader</a>
                <span class="slideLeft">files with expiration date...</span>
            </div>
        </header>
        <div class="container" id="success">
            <p class="notice">This is your download link</p>
            <p id="download-link">
                <?php
                    session_start();
                ?>
                <a href="image.php"><?= "http://localhost/PhpProject1/PHP_5/" . $_SESSION["link"] ?></a>
            </p>
            <div id="share" class="slideLeft">
                <a href="#"><img src="images/fb-128.png" alt="Facebook"></a>
            </div>
        </div>

        <?php
            if(isset($_SESSION["success"])){
                $file = fopen("list.txt" , "r");
                $list = fread($file , filesize('list.txt'));
                fclose($file);
                $list = explode("|", $list);
                $_SESSION["link"] = $list[1];
                $_SESSION["image"] = true;        
                unset($_SESSION["success"]);
            }  else {
                header('Location:index.php');
            }
        ?>
    </body>
</html>
