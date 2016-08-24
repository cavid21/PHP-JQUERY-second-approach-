<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery-3.1.0.min.js"></script>
    </head>
    <body>
        <header>
            <div class="container">
                <a href="#">Uploader</a>
                <span class="slideLeft">files with expiration date...</span>
            </div>
        </header>
        <div class="container" id="main">
            <form action="check.php" enctype="multipart/form-data" method="post" id="upload">
                <fieldset id="filefield">
                    <label id="upload-block" for="file">
                        <input type="file" name="file" id="file" onchange="readURL(this);">
                    </label>
                </fieldset>
                <fieldset id="expiration">
                    <div>
                        <select name="appData[extime]" id="extime">
                            <option value="0">Never expires on time</option>
                            <option value="24">Expires after one day</option>
                            <option value="72">Expires after three days</option>
                            <option value="168">Expires after seven days</option>
                            <option value="720">Expires after thirty days</option>
                            <option value="2160">Expires after ninety days</option>
                        </select>
                    </div><div>
                        <select name="appData[exuse]" id="exuse">
                            <option value="0">Never expires on downloads</option>
                            <option value="1">Expires after one download</option>
                            <option value="10">Expires after ten downloads</option>
                            <option value="100">Expires after one hundred downloads</option>
                            <option value="1000">Expires after one thousand downloads</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset id="passwordBlock">
                    <button id="passwordBtn">Add password</button>
                    <input type="password" name="password"  id="password">
                </fieldset>

                <p class="clearfix submit"><input type="submit" class="btn" value="Upload" id="submit"></p>
            </form>
            <div id="contactMsj">
                
            </div>
        </div>
        <script>
            $('#passwordBtn').click(function (event) {
                $( this ).attr("style" , "display:none");
                $( "#password" ).attr("style" , "display:block");
                event.preventDefault();
            });
            $('#upload').submit(function (event) {
                $('#contactMsj').addClass('hidden');
                $('#contactMsj').empty();

                var password = $('input[name=password]').val();
                var file = $('input[name=file]').val();
                var check = false;

                if (password === "") {
                    $('#contactMsj').removeClass('hidden');
                    $('#contactMsj').append('<p>Passwordu daxil et!</p>');
                    check = true;
                }
                if (file === "") {
                    $('#contactMsj').removeClass('hidden');
                    $('#contactMsj').append('<p>Fileni yukle</p>');
                    check = true;
                }
                if (!check) {
                     $('#upload').submit();
                }
                console.log(check);
                event.preventDefault();
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    $("#upload-block").css({
                        "backgroundImage" : "url('images/images.png')",
                        "backgroundSize" : "cover"
                    });
                }
            }
        </script>
       
    </body>
</html>
