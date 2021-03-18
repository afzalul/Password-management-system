<?php
    include"functions.php";
    if(is_logged_user()==false)
    {
        redirect("user_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
</head>
<body>
    
    <div class="alert alert-success" role="alert" text-align:center>
      <h1>WELCOME <?php show_user_image(); ?></h1>
    </div>
    
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="user_update.php">Update profile</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="encrypt.php">Encrypt</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="decrypt.php">Decrypt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_notification.php?status=0">Notification(<?php echo new_notification(); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_logout.php">Logout</a>
          </li>
        </ul>
        <br>
        <div class="container">
        <div class="col-sm-6">
           <?php 
                if(isset($_POST['submit']))
                {
                    update_user();
                }
            ?>
            <form action="user_update.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="password">Old Password</label> 
                  <input type="password" name="old_password" class="form-control" required>
               </div>
                 
                  <div class="form-group">
                   <label for="username">New Username</label>
                   <input type="text" name="new_username" class="form-control" required>
               </div>
                
                <div class="form-group">
                  <label for="password">New Password</label> 
                  <input type="password" name="new_password" class="form-control" required>
               </div>
               
               <div class="form-group">
                  <label for="password">Confirm New Password</label> 
                  <input type="password" name="confirm_new_password" class="form-control" required>
               </div>
                
                <div class="form-group">
                  <label for="iamge">Image</label> 
                  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
               </div>
                
                <input type="submit" name="submit"class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
    
    
</body>
</html>