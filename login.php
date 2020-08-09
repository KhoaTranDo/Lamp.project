
<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="./stylesheets/css/login.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="d-flex justify-content-center h-100">
        <div class="card" style="border-radius: 8px; width: 350px;height:  500px;">
          <div class="card-header" style="text-align: center;">
            <h2>Sign In</h2>
          </div>
          <div class="card-body">
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
              <div class="form-group" style="display: flex; border-radius: 4px;margin-top: 20px;">
                  <img src="captcha.php" name=>
                <input class="form-control" type="text" name="captcha_submit" placeholder="Captcha" style="width:350px;margin-left:3px;"> 
              </div>
              <div class="row align-items-center remember">
                <input type="checkbox">Remember Me
              </div>
              <div class="form-group" style="margin-top: 20px;width: 100%; height: 35px;">
                <input type="submit" value="Login" name="submit_login" class="btn float-right login_btn" style="width: 100% ;height: 100%;">
              </div>
            </form>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-center links">
              Don't have an account?<a href="register.php">Sign Up</a>
            </div>
            <div class="d-flex justify-content-center">
              <a href="changePassword.php">Forgot your password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      session_start();
      if(isset($_POST["submit_login"])) {
          $captcha_code = $_SESSION['cap_code'];
          $captcha_submit = $_POST['captcha_submit'];
          $username=$_POST["username"];
          $password=$_POST["password"];
          $password=md5($password);

          if(empty($username) || empty($password)){
              echo "Please Input Infomation !!!";
          }
          else{
            $sql = "select * from member where username = '".$username."' and pass = '".$password."' "; 
            $query = mysqli_query($conn,$sql); 
            $num_rows = mysqli_num_rows($query);
            if ($num_rows == 0) {
              echo "User name or Password not success !";
            }else{
              //header('Location: controller.php');
              if($captcha_submit == $captcha_code){
                $_SESSION['username'] = $username;
                header('Location: controller.php');
              }
              else{
                  echo "";
              }
            }
          }
      }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
  </body>
</html>