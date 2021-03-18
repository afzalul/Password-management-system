<?php   
    include"functions.php";
    if(is_logged_user()==true)
    {
        redirect("user_homepage.php");
    }
        
    include"e_travel_header.php"; 
        
?>
<body>
    
        <h1 id="first">Password Management System</h1>
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
        <br><br>
        <div class="container">
        <div class="col-sm-6">
           <h2>User Login</h2>
            <form action="user_login.php" method="post">
              <?php    
                    if(isset($_POST['submit']))
                    {
                        login_verification_user();
                    }
                ?>
               <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text" name="username" class="form-control" required>
               </div>
                
                <div class="form-group">
                  <label for="password">Password</label> 
                  <input type="password" name="password" class="form-control" required>
               </div>
               
                
                <input type="submit" name="submit"class="btn btn-lg btn-primary btn-block" value="Sign in">
            </form>
            <br>
            <p><a href="user_password_recover.php">Forgot Password?</a></p>
            <br>
            <p><a href="user_signup.php">Not Registered?</a></p>
            
        </div>
    </div>
        
        
        
        <?php include"e-travel_footer.php"; ?>
    </div>
</body>
</html>