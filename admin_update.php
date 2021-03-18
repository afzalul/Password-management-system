<?php
    include"functions.php";
    if(is_logged_in()==false)
    {
        redirect("admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<body>
 
  <div class="alert alert-success" role="alert" text-align:center>
      <h1>WELCOME <?php echo $_SESSION['username']; ?></h1>
    </div>
    
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="admin_update.php">Update profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_sign_up.php">Add Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="join_request.php">Join request(<?php total_request(); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_no.php">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="admin_feedback.php">Message</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
        <br><br>
    <div class="container">
        <div class="col-sm-6">
           <?php 
                if(isset($_POST['submit']))
                {
                    update_admin();
                }
            ?>
            <br>
            <form action="admin_update.php" method="post">
                
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
                
                <input type="submit" name="submit"class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
        <?php include"e-travel_footer.php"; ?>
</body>
</html>