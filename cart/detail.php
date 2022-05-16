<?php 
    include("server.php");

    if(isset($_GET["det"])){

        $id = $_GET["det"];
        $selecte = mysqli_query($conn , "SELECT * from shop where id = $id");
        $sel = mysqli_fetch_assoc($selecte);

        $name = $sel["name"];
        $price = $sel["price"];
        $img = $sel["img"];
        $detail = $sel["detail"];

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #eee;">
    <div class="card w-75 mx-auto d-3 mt-5" style="text-align:center;">
        <img width="400px" height="400px" class="rounded mx-auto d-block" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($img); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $name; ?></h5>
        </div>
        <div class="card-body">
            <p class="card-text"><?php echo $detail; ?></p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mt-3">
                <span>ราคา</span>
                <span><?php echo $price; ?>  บาท</span>
            </div>
        </div>
        <div class="card-body">
            <a href="index.php" type="button" class="btn btn-primary btn-block btn-lg">กลับ</a>
        </div>
    </div>
</body>
</html>