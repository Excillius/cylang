<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/profilepic.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapping1">
        <h1 style="color: white;">Profile Picture</h1>
        <div class="wrapping2">
            <div class="form">
            <form action="php/updatePicture.php" method="post" enctype="multipart/form-data" id="upload">
                Choose File: <input type="file" name="file" onchange="profpic(event)"/>
                <input type="submit" name="upload" value="upload" />
            </form>
            </div>
            <div class="foto" id="foto">
            </div>
        </div>
    </div>
<script>
    var foto = document.getElementById("foto");
    var profpic = function(event){
        foto.style.backgroundImage = "url("+URL.createObjectURL(event.target.files[0])+")";
    }
</script>
</body>
</html>