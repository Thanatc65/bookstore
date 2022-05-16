<?php

    include("server.php");

    $query = mysqli_query($conn , ("SELECT * from shop where id = 1"));
    $query2 = mysqli_query($conn , ("SELECT * from shop where id = 2"));
    $query3 = mysqli_query($conn , ("SELECT * from shop where id = 3"));
    $query4 = mysqli_query($conn , ("SELECT * from shop where id = 4"));


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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body style="background-color: #eee;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto" >
            <a class="nav-item nav-link active" href="#" id="nav">หนัาหลัก<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="#shop" id="nav">ซื้อสินค้า</a>
            <a class="nav-item nav-link active" href="cart.php" id="nav">ตะกร้า</a>
            </div>
        </div>
    </nav>

    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>ยินดีต้อนรับสู่ <span>BookStore</span></h1>
        <h2>เว็บนี้เป็นส่วนหนึ่งของเว็บที่สร้างขึ้นมาเพื่อฝึกเขียน PHP</h2>
        <div class="d-flex">
            <a href="#shop" class="btn-get-started scrollto">ซื้อเลย</a>
            </div>
        </div>
    </section>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
            <li data-slide-to="0" class="active"></li>
            <li data-slide-to="1"></li>
            <li data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="book1.jpg">
            <div class="carousel-caption">
                <h3>BOOK1</h3>
            </div>   
            </div>
            <div class="carousel-item">
            <img src="book2.jpg" >
            <div class="carousel-caption">
                <h3>BOOK2</h3>
            </div>   
            </div>
            <div class="carousel-item">
            <img src="book3.png">
            <div class="carousel-caption">
                <h3>BOOK3</h3>
            </div>   
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <section id="shop">
    <div class="card mt-5 w-75 mx-auto d-3">
        <div class="card-header">
        <p class="h-1 text-center font-weight-bold" style="font-size: 40px; color:#106eea">SHOP</p>
        </div>
    </div>

    <div class="card-deck w-75 mx-auto d-3 mt-5">
    <?php while($row = mysqli_fetch_assoc($query)){ ?>
    <div class="card">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" class="card-img-top" width="300px" height="300px">
        <div class="card-body">
        <h5 class="card-title" style="text-align:center"><?php echo $row["name"]?></h5>
        <div class="d-flex justify-content-between mt-4"><span>ราคา</span><span><?php echo $row['price']; ?></span></div>
        <br>
        <a href="cart.php?buy=<?php echo $row["id"];?>" class="btn btn-primary" style="justify-content: center;align-items: center;display: flex;">ซื้อ</a>
        <p class="card-text" style="text-align:center">
            <a href="detail.php?det=<?php echo $row["id"] ?>" class="text-muted">รายละเอียด</a>
        </p>
        </div>
    </div>
    <?php } ?>

    <?php while($row = mysqli_fetch_assoc($query2)){ ?>
        <div class="card">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" class="card-img-top" width="300px" height="300px">
        <div class="card-body">
        <h5 class="card-title" style="text-align:center"><?php echo $row["name"]?></h5>
        <div class="d-flex justify-content-between mt-4"><span>ราคา</span><span><?php echo $row['price']; ?></span></div>
        <br>
        <a href="cart.php?buy=<?php echo $row["id"];?>" class="btn btn-primary" style="justify-content: center;align-items: center;display: flex;">ซื้อ</a>
        <p class="card-text" style="text-align:center">
            <a href="detail.php?det=<?php echo $row["id"] ?>" class="text-muted">รายละเอียด</a>
        </p>
        </div>
    </div>
    <?php } ?>

    <?php while($row = mysqli_fetch_assoc($query3)){ ?>
        <div class="card">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" class="card-img-top" width="300px" height="300px">
        <div class="card-body">
        <h5 class="card-title" style="text-align:center"><?php echo $row["name"]?></h5>
        <div class="d-flex justify-content-between mt-4"><span>ราคา</span><span><?php echo $row['price']; ?></span></div>
        <br>
        <a href="cart.php?buy=<?php echo $row["id"];?>" class="btn btn-primary" style="justify-content: center;align-items: center;display: flex;">ซื้อ</a>
        <p class="card-text" style="text-align:center">
            <a href="detail.php?det=<?php echo $row["id"] ?>" class="text-muted">รายละเอียด</a>
        </p>
        </div>
    </div>
    <?php } ?>

    <?php while($row = mysqli_fetch_assoc($query4)){ ?>
        <div class="card">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" class="card-img-top" width="300px" height="300px">
        <div class="card-body">
        <h5 class="card-title" style="text-align:center"><?php echo $row["name"]?></h5>
        <div class="d-flex justify-content-between mt-4"><span>ราคา</span><span><?php echo $row['price']; ?></span></div>
        <br>
        <a href="cart.php?buy=<?php echo $row["id"];?>" class="btn btn-primary" style="justify-content: center;align-items: center;display: flex;">ซื้อ</a>
        <p class="card-text" style="text-align:center">
            <a href="detail.php?det=<?php echo $row["id"] ?>" class="text-muted">รายละเอียด</a>
        </p>
        </div>
    </div>
    <?php } ?>
    
</div>
</section>

    <footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <p class="text-dark font-weight-bold">Made by Thanat</p>
    </div>
    </footer>
</body>
</html>