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
            <a class="nav-link" href="admin_update.php">Update profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_sign_up.php">Add Admin</a>
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
        <br>
    <div class="container">  
        <div class="col-sm-6">
            <form action="admin_sign_up.php" method="post">
              
               <?php 
                    if(isset($_POST['submit']))
                    {
                        insert_new_admin();
                    }
                ?>
               <div class="form-group">
                   <label for="name">Name</label>
                   <input type="text" name="full_name" class="form-control" required>
               </div>
               
                <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text" name="username" class="form-control" required>
               </div>
                
                <div class="form-group">
                  <label for="password">Password</label> 
                  <input type="password" name="password" class="form-control" required>
               </div>
               
               <div class="form-group">
                  <label for="password">Confirm Password</label> 
                  <input type="password" name="re_password" class="form-control" required>
               </div>
                
                <input type="submit" name="submit"class="btn btn-primary" value="ADD">
            </form>
        </div>
    </div>
        <?php include"e-travel_footer.php"; ?>
</body>
</html>