<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <p class="pclass">Your image download succesfully <strong>userImages</strong> folder</p>
        <?php
            session_start();
            if(isset($_SESSION["image"])){
                $profile_Image = $_SESSION["link"]; //image url
                $userImage = rand() . substr($_SESSION["link"], 11); // renaming image
                $path = 'userImages/';  // your saving path
                $ch = curl_init($profile_Image);
                $fp = fopen($path . $userImage, 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                curl_close($ch);
                fclose($fp);
                unset($_SESSION["image"]);
            }else{
                header('Location:index.php');
            }
        ?>
    </body>
</html>
