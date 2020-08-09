<?php 
    include 'connection.php';
    
	$result = $conn->query("SELECT * FROM product");
	$product = $result->fetch_all(MYSQLI_ASSOC);
	
?>
<?php
  if (isset($_POST["submit"])) {
    $image=$_FILES['image']['name'];
    $productname = $_POST["productname"];
    $productnumber = $_POST["productnumber"];
    $unitprice = $_POST["unitprice"];
    if (empty($productname) || empty($productnumber) || empty($unitprice)) {
      echo "Please Input Infomation !!!";
    } else {
      $sql = "INSERT INTO product(productname,productnumber,unitprice,Images) VALUES ('$productname','$productnumber','$unitprice','$image')";
      mysqli_query($conn, $sql);
      header('Location: product.php');
    }
  }

  ?>
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
       
      $expensions= array("jpeg","jpg","png");
       
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
      }
       
      if($file_size > 2097152) {
         $errors[]='Kích thước file không được lớn hơn 2MB';
      }
       
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"photo/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="./stylesheets/css/controller.css">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="./stylesheets/css/controller.css">
</head>

<body>


    <!--Product-->
    <div class="container well" style="min-height: 400px;">
        <h1 class="text-center">List Product</h1>

        <div style="height: 500px; overflow-y: auto;  font-size: 20px">
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Number</th>
                        <th>Unit Prince</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $product) :  ?>
                    <tr>
                        <td style="width:30%">
                            <?php
					              	echo "<div id='img_div'>";
					              	echo "<img src='photo/".$product['Images']."' width=100% >";
					              	echo "</div>";
					            	?></td>
                        <td><?= $product['id']; ?></td>
                        <td><?= $product['productname']; ?></td>
                        <td><?= $product['productnumber']; ?></td>
                        <td><?= $product['unitprice']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div id="content">
                </form>
            </div>
        </div>

        <h1 class="text-center">Add New Product</h1>
        <!--  Thêm ảnh vào trang -->
        <form method="POST" action="" enctype="multipart/form-data">
            <label>Add Image:</label>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image">
         <!--Thêm ảnh vào trang-->               
            <div class="card-body" style="width: 100%; height: 100%;">
                <form class="form" method="POST">
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="productname" placeholder="Product name">
                    </div>
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="productnumber" placeholder="Product number">
                    </div>
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="unitprice" placeholder="Unit price">
                    </div>
                    <div style="display: inline-block; width: 100%; height: 100%;">
                        <div class="form-group" style="margin-top: 20px;float: left; height: 30px; width: 49%;">
                            <input type="submit" value="Add Product" name="submit" class="btn btn-info"
                                style="width: 100% ;height: 100%;">
                        </div>
                        <div class="form-group" style="margin-top: 20px;float: right; height: 30px; width: 49%;">
                            <a href="controller.php" class="btn btn-danger" role="button"
                                style="width: 100% ;height: 100%;">
                                <div style="width: 100% ;height: 100%;display: flex;">
                                    <span style="margin-top: 3px;margin-left: 38%;">Cancel</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>

    <footer class="py-5 bg-dark" style="height: 240px;  position: relative;">
        <div class="container">
            <p class="m-0 text-center text-white">CODE AND DESIGN BY DUY , KHOA , DUOC</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"
        integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous">
    </script>
    <script src="./stylesheets/js/bootstrap.bundle.min"></script>
</body>

</html>