<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css">
  <link rel="stylesheet" href="./stylesheets/css/login.css">
  <title>Register</title>
</head>

<body>
  <!-- header -->
  <div class="container">
    <div class="d-flex justify-content-center h-100">
      <div class="card" style="border-radius: 8px; height: 500px;width: 400px;">
        <div class="card-header" style="text-align: center;">
          <h2>Register</h2>
        </div>
        <div class="card-body" style="width: 100%; height: 100%;">
          <form class="form" method="POST">
            <div class="input-group form-group" style="margin-top: 30px;">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="input-group form-group" style="margin-top: 20px;">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="input-group form-group" style="margin-top: 20px;">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" class="form-control" name="email" placeholder="email">
            </div>
            <div class="input-group form-group" style="margin-top: 20px;">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-address-book"></i></span>
              </div>
              <input type="text" class="form-control" name="fullname" placeholder="fullname">
            </div>
            <div class="input-group form-group" style="margin-top: 20px;">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
              </div>
              <input type="date" class="form-control" name="birthday" placeholder="birthday">
            </div>
            <div class="input-group form-group" style="margin-top: 20px;height: 35px;">
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
                <input type="submit" value="Register" name="submit" class="btn btn-info" style="width: 100% ;height: 100%;">
              </div>
              <div class="form-group" style="margin-top: 20px;float: right; height: 30px; width: 49%;">
                <a href="login.php" class="btn btn-danger" role="button" style="width: 100% ;height: 100%;">
                  <div style="width: 100% ;height: 100%;display: flex;">
                    <span style="margin-top: 3px;margin-left: 38%;">Cancel</span>
                  </div>
                </a>  
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $password = md5($password);
    if (empty($username) || empty($password) || empty($email) || empty($fullname) || empty($birthday) || empty($gender)) {
      echo "Please Input Infomation !!!";
    } else {
      $sql = "INSERT INTO member(username,pass,email,fullname,birthday,gender) VALUES ('$username','$password','$email','$fullname','$birthday','$gender')";
      mysqli_query($conn, $sql);
      echo "<script>window.location.href = 'login.php'; </script>";
    }
  }
  ?>
  </div>
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
</body>

</html>