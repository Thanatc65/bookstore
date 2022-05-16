<?php

    include("server.php");

    if(isset($_GET["buy"])){

        $id = $_GET["buy"];
        $select = mysqli_query($conn , "SELECT * from shop where id = $id");

        $sel = mysqli_fetch_assoc($select);

        $name = $sel["name"];
        $price = $sel["price"];
        // $_SESSION["img"] = $sel["img"];

        $add = mysqli_query($conn , "INSERT into incart(name , price , id_img) value('$name' , '$price' ,'$id')");


    }

    $incart = mysqli_query($conn , "SELECT * from incart");

    if(isset($_GET["del"])){
        $id = $_GET["del"];

        $query = mysqli_query($conn , "DELETE from incart where id = $id");

        header("location: cart.php");

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

    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                        class="fas fa-angle-down mt-1"></i></a></p>
                </div>
                </div>

                <?php while($row = mysqli_fetch_assoc($incart)) { ?>
                <input type="hidden" value="<?php echo $row["id_img"]?>">

                <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                    <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">

                    <?php 

                    $select = mysqli_query($conn , "SELECT * from shop") ;
                    $sel = mysqli_fetch_assoc($select);
                    $id = $row["id_img"];
                    $se = mysqli_query($conn , "SELECT * from shop where id = $id");
                    $im = mysqli_fetch_assoc($se);

                        if($id != 0) { ?>
                        <img
                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($im["img"]);?>"
                        class="img-fluid rounded-3">
                    <?php }
                    ?>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <p class="lead fw-normal mb-2"><?php echo $row["name"]?></p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                        </button>

                        <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />

                        <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h5 class="mb-0"><?php echo $row["price"]?>  บาท</h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="cart.php?del=<?php echo $row["id"];?>" class="text-danger">
                            <img src="bin.svg" height="25px" width="25px">
                        </a>
                    </div>
                    </div>
                </div>
                </div>

                <?php } ?>

                <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-block btn-lg">ชำระเงิน</button>
                    <a href="index.php" type="button" class="btn btn-light btn-block btn-lg">กลับ</a>
                </div>
                </div>

            </div>
            </div>
        </div>
    </section>
</body>
</html>