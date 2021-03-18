<?php
    include"functions.php";
    if(is_logged_user()==false)
    {
        redirect("user_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<body>
    
    <div class="alert alert-success" role="alert" text-align:center>
      <h1>WELCOME <?php show_user_image(); ?></h1>
        
    </div>
    
    
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="user_update.php">Update profile</a>
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
    
    
</body>
</html>