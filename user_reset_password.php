<?php   
    include"functions.php";
    if(is_logged_user())
        redirect("user_homepage.php"); 
    include"e_travel_header.php"; 
        
?>
<body>
    
        <h1 id="first">E-Travel Management System</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="admin_login.php">Admin Login</a>
        
          <a class="nav-item nav-link active" href="user_login.php">User Login</a>
          <a class="nav-item nav-link" href="contact_us.php">Contact Us</a>
        </div>
      </div>
    </nav>
        
        <div class="container">
        <div class="col-sm-6">
           <h2>User Password Recover</h2>
            <form action="user_reset_password.php" method="post">
              <?php 
                if(isset($_POST['submit']))
                    {
                        reset_password();
                    }
                ?>
               <div class="form-group">
                   <label for="username">Enter New Password</label>
                   <input type="password" name="password" class="form-control" required>
               </div>
                
                <div class="form-group">
                  <label for="">Confirm New Password</label> 
                  <input type="password" name="confirm_password" class="form-control" required>
               </div>
               <div class="form-group">
                   
                  <input type="text" name="username" class="form-control" value="<?php echo $_GET['username']; ?> " hidden>
               </div>
               
                
                <input type="submit" name="submit"class="btn btn-lg btn-primary btn-block" value="Submit">
            </form>
            
        </div>
    </div>
        
        <?php include"e-travel_footer.php"; ?>
    </div>
</body>
</html>
