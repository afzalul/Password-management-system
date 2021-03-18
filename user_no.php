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
            <a class="nav-link" href="admin_sign_up.php">Add Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="join_request.php">Join request(<?php total_request(); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="user_no.php">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="admin_feedback.php">Message</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
        <br><br>
        <ul>
            <li><form action="user_no.php" method="post">
               <input type="text" name="search" required placeholder="enter">
               <input type="submit" name="submit" value="Search">
                
            </form></li>
        </ul>
        
    <?php 
        
      if(isset($_POST['submit']))
        {
            search_user();
        }
     else
      read_user();
    ?>
    <?php include"e-travel_footer.php"; ?>
</body>
</html>