<?php 

include("connection.php");
session_start();

if (isset($_SESSION['username'])) {
	$profile = null;
	$username = $_SESSION['username'];
	  
	
	$select_sql = "SELECT * FROM member WHERE username='{$username}';";
	$result = $conn->query($select_sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$profile = array();
		$profile["username"] = $row["username"];
		$profile["email"] = $row["email"];
		$profile["password"] = $row["password"];
		$profile["fullname"] = $row["fullname"];
		$profile["birthday"] = $row["birthday"];
		$profile["gender"] = $row["gender"];
	} else {
		session_destroy();
		header("Location: login.php");
	}	
                    
} else {

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
<?php 


	$result = $conn->query("SELECT * FROM member");
	$customers = $result->fetch_all(MYSQLI_ASSOC);

    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insert</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="./stylesheets/css/register.css">
</head>

<body>

    <div class="container well" style="min-height: 400px;">
        <h1 class="text-center">List User</h1>

        <div style="height: 300px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Birth Day</th>
                        <th>Gender</th>
                        <th>PassWord</th>
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
                        <td><?= $customer['id']; ?></td>
                        <td><?= $customer['username']; ?></td>
                        <td><?= $customer['email']; ?></td>
                        <td><?= $customer['fullname']; ?></td>
                        <td><?= $customer['birthday']; ?></td>
                        <td><?= $customer['gender']; ?></td>
                        <td><?= $customer['pass']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h1 class="text-center">CHANGE INFOMATION</h1>

        <!--  Thêm ảnh vào trang -->
        <form method="POST" action="" enctype="multipart/form-data">
            <label>Add Image:</label>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image">
         <!--Thêm ảnh vào trang-->               
            <div class="card-body" style="width: 100%; min-height: 100%;">
                <form class="form" method="POST">
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <input type="text" class="form-control" name="change"
                            placeholder="Enter username or gmail have change">
                    </div>
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="email">
                    </div>
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                        </div>
                        <input type="text" class="form-control" name="fullname" placeholder="fullname">
                    </div>
                    <div class="input-group form-group" style="margin-top: 30px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                        </div>
                        <input type="date" class="form-control" name="birthday" placeholder="birthday">
                    </div>
                    <div class="input-group form-group" style="margin-top: 30px;height: 35px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-genderless"></i></span>
                        </div>
                        <select name="gender" class="form-control" style="height: 35px;">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div style="display: inline-block; width: 100%; height: 100%;">
                        <div class="form-group" style="margin-top: 20px;float: left; height: 30px; width: 49%;">
                            <input type="submit" value="Change" name="update" class="btn btn-info"
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
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"
        integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous">
    </script>
    </form>
    </div>
    <footer class="py-5 bg-dark" style="height: 240px;  position: relative;">
        <div class="container">
            <p class="m-0 text-center text-white">CODE AND DESIGN BY DUY , KHOA , DUOC</p>
        </div>
    </footer>
</body>

</html>
<?php
if(isset($_POST['update'])){
  $image=$_FILES['image']['name'];
	$username = $_POST['change'];
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$sql= "UPDATE `member` SET `email`='".$email."',`fullname`='".$fullname."',`birthday`='".$birthday."',`gender`='".$gender."',`Images`='".$image."' WHERE `username`='".$username."'";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "Update thành công!"; 
	}
	else{
		echo "Khong thanh cong";
		echo $username;
		echo $fullname;
		echo $gender ;
		echo $birthday;
		echo $email;
	}
}
?>