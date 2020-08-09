<?php   
 session_start();  
 include("connection.php");
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css">
>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <spa style="color:white;font-size:20px">
                <?php
					if (isset($_SESSION["username"]))
					{
						echo '' . $_SESSION["username"];
					}
				?>
            </spa>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="controller.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="insert.php">Update User</a>
                    </li>
                    <li class="nav-item" style="position: relative;">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item" style="position: Show Infomation;">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                    <li class="nav-item" style="position: Show Infomation;">
                        <a class="nav-link" href="ShowProduct.php">User page</a>
                    </li>
                    <li class="nav-item" style="position: relative;">
                        <a class="nav-link" href="login.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="width:1000px;">
        <h3 align="center">Game Product</h3><br />
        <?php  
                $query = "SELECT * FROM product ORDER BY id ASC";  
                $result = $conn->query($query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>
        <div class="col-md-4">
            <form method="post" action="ShowProduct.php?action=add&id=<?php echo $row["id"]; ?>">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:10px;"
                    align="center">
                    <img src="./photo/<?php echo $row["Images"]; ?>" class="img-responsive" /><br />

                    <h4 class="text-info"><?php echo $row["productname"]; ?></h4>
                    <h4 class="text-danger">$ <?php echo $row["unitprice"]; ?></h4>
                    <input type="text" name="productnumber" class="form-control" value="1" />
                    <input type="hidden" name="productname" value="<?php echo $row["productname"]; ?>" />
                    <input type="hidden" name="unitprice" value="<?php echo $row["unitprice"]; ?>" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                        value="Add to Cart" />
                </div>
            </form>
        </div>
        <?php  
                     }  
                }  
                ?>
        <div style="clear:both"></div>
      
  
</body>

</html>