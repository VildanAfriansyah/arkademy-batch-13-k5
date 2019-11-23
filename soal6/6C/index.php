<?php
    $host = "localhost";
        $username = "root";
        $password = "";
        $db = "arkademy";

        $connection = mysqli_connect($host,$username,$password,$db);

    if(isset($_POST['add'])){
        $cashier = $_POST['cashier'];
        $product = $_POST['product'];
        $category = $_POST['category'];
        $price = $_POST['price'];

        $sql = mysqli_query($connection, "INSERT INTO `product`( `product`, `price`, `id_category`, `id_cashier`) VALUES ('$product','$price','$category','$cashier')");

        if($sql){
            header('location:index.php');
        }else{
            echo 'ERROR';
        }
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $product = $_POST['product'];
        $cashier = $_POST['cashier'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $sql = mysqli_query($connection,"UPDATE product
                SET name = '$product', price = '$price', id_category='$category',id_cashier='$cashier' WHERE id='$id'");
    } 
                        
    if(isset($_POST['delete'])){
        $id = $_POST['delete'];

        $sql = mysqli_query($connection,"DELETE FROM product WHERE id_product='$id'");
    }

?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/fa/css/all.css">
    

    <title>Arkademy Bootcamp</title>
  </head>
  <body>
      
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow bg-white rounded">
        <a class="navbar-brand" href="#" >
            <img src="assets/img/logo-arka.png" width="80" class="d-inline-block align-top" alt="">
            
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <span class="navbar-brand mb-0 h1 font-weight-bold"><span style="color: #ff8fb2">ARKADEMY</span> COFFEE SHOP</span>
            
            <ul class="navbar-nav mr-auto">
            </ul>

            <span class="navbar-text">
                <button type="button" class="btn btn-primary custom-btn shadow rounded" style="width: 8rem;" data-toggle="modal" data-target="#addModal">
                ADD
                </button>
            </span>
        </div>
      
    </nav>
    
    <div class="row h-100 justify-content-center align-items-center"> 
        <div class="col-md-8"> 
            <div class="card shadow rounded" style="margin-top:80px; margin-bottom:40px">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th style="width: 8%;">No</th>
                                <th style="width: 20%;">Cashier</th>
                                <th style="width: 10%;">Product</th>
                                <th style="width: 10%;">Category</th>
                                <th style="width: 15%;">Price</th>
                                <th style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                           <?php
                            $host = "localhost";
                            $username = "root";
                            $password = "";
                            $db = "arkademy";

                            $connection = mysqli_connect($host,$username,$password,$db);

                            $no=1;
                            $sql = mysqli_query($connection,"SELECT * FROM product INNER JOIN cashier ON product.id_cashier = cashier.id_cashier INNER JOIN category on product.id_category = category.id_category ");
                            while($rs=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td style="width: 8%;" scope="row"><?= $no++; ?></td>
                            <td style="width: 20%;"><?= $rs['name'] ?></td>
                            <td style="width: 10%;"><?= $rs['product'] ?></td>
                            <td style="width: 10%;"><?= $rs['category'] ?></td>
                            <td style="width: 15%;">Rp. <?= $rs['price'] ?></td>
                            <td style="width: 20%;"><a href="#" class="text-success" data-toggle="modal" data-target="#edit" data-id="<?= $rs['id_product'] ?>" data-product="<?= $rs['product'] ?>" data-cashier="<?= $rs['name'] ?>" data-category="" data-price="<?= $rs['price'] ?>" >Edit</a> | <a href="#" class="text-danger" onclick="hapus()">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
</tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>     

    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form action="" method="post">
                                <div class="form-group">
                                    <select class="form-control" name="cashier">
                                        <?php 
                                            $sql = mysqli_query($connection, "SELECT * FROM cashier");
                                            while($rs = mysqli_fetch_array($sql)){
                                                echo '
                                                <option value="'.$rs['id_cashier'].'">
                                                     '.$rs['name'].'
                                                </option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="product" placeholder="product">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="category">
                                        <?php 
                                            $sql = mysqli_query($connection, "SELECT * FROM category");
                                            while($rs = mysqli_fetch_array($sql)){
                                                echo '
                                                <option value="'.$rs['id_category'].'">
                                                     '.$rs['category'].'
                                                </option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="price" placeholder="price">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="add" class="btn btn-primary custom-btn">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- Modal Edit -->
        
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="action.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <select class="form-control" id="cashier" name="cashier">
                                <?php 
                                            $sql = mysqli_query($connection, "SELECT * FROM cashier");
                                            while($rs = mysqli_fetch_array($sql)){
                                                echo '
                                                <option value="'.$rs['id_cashier'].'">
                                                     '.$rs['name'].'
                                                </option>
                                                ';
                                            }
                                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="category" name="category">
                                <?php
                                    $sql = mysqli_query($connection, "SELECT * FROM category");
                                    while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?= $data['id'] ?>"><?= $data['category'] ?></option>
                                        <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="product" name="product" placeholder="Product" require>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Rp. 10.000" require>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit" name="edit" class="btn btn-primary">EDIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <!-- Modal Del -->
    <div class="modal" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div style="text-align: center;">
                    <label for="" style="margin-top: 30px; font-size: 2rem;">Data Raisa Andriani ID <span style="color: #ff8fb2">#1</span></label>
                    <p><span style="font-size: 3em; color: green; " style="text-align: center;">
                            <i class="far fa-check-circle fa-2x "></i>
                    </span></p>
                    <label for="" style="font-size: 2rem; margin-bottom: 30px;">Berhasil Dihapus!</label>
                </div>
            </div>
            </div>
        </div>
    </div> 

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>