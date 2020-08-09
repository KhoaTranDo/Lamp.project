<?php 
	include 'connection.php';
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM member LIMIT $start, $limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);

	$result = $conn->query("SELECT * FROM product /* LIMIT $start, $limit */");
	$product = $result->fetch_all(MYSQLI_ASSOC);


	$result1 = $conn->query("SELECT count(id) AS id FROM member");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	
	$result12 = $conn->query("SELECT count(id) AS id FROM product");
	$custCount = $result12->fetch_all(MYSQLI_ASSOC);
	
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="./stylesheets/css/controller.css">
</head>

<body>

    <!-- Navigation -->
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

    <div class="container well" style="height: 80px;">
        <div class="row">
           <h1 style="margin: auto">Administator Managerment</h1>
		</div>
    </div>
	
	
    <!--User-->
    <div class="container well" style="min-height: 400px;">
        <h1 class="text-center">List User</h1>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li>
							<a href="controller.php?page=<?= $Previous; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo; Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $pages; $i++) : ?>
							<li><a href="controller.php?page=<?= $i; ?>"><?= $i; ?></a></li>
							<?php endfor; ?>
							<li>
								<a href="controller.php?page=<?= $Next; ?>" aria-label="Next">
									<span aria-hidden="true">Next &raquo;</span>
								</a>
							</li>
							<li>
							<select class="form-control form-control-lg" name="limit-records" id="limit-records">
								<option disabled="disabled" selected="selected"> Limit Records</option>
								<?php foreach([10,100,500,1000,5000] as $limit): ?>
								<option
									<?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?>
									value="<?= $limit; ?>"><?= $limit; ?></option>
								<?php endforeach; ?>
							</select>
								</li>
						</ul>
					</nav>
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
						<th>Image</th>
                        <th>PassWord</th>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Birth Day</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer) :  ?>
                    <tr>
					<td style="width:30%">
                            <?php
					              	echo "<div id='img_div'>";
					              	echo "<img src='photo/".$customer['Images']."' width=100% >";
					              	echo "</div>";
					            	?></td>
                        <td><?= $customer['pass']; ?></td>
                        <td><?= $customer['id']; ?></td>
                        <td><?= $customer['username']; ?></td>
                        <td><?= $customer['email']; ?></td>
                        <td><?= $customer['fullname']; ?></td>
                        <td><?= $customer['birthday']; ?></td>
                        <td><?= $customer['gender']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--Product-->
    <div class="container well" style="min-height: 400px;">
        <h1 class="text-center">List Product</h1>

        <div style="height: 600px; overflow-y: auto;">
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
        </div>
    </div>
                        
    <footer class="py-5 bg-dark" style="height: 240px;">
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