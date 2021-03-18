<?php   
    include"functions.php";
    if(is_logged_user())
        redirect("user_homepage.php");
    include"e_travel_header.php"; 
        
?>
<body>
    
        <h1 id="first">Password Management System</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="e-travel%20management%20home%20page.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="admin_login.php">Admin Login</a>
        
          <a class="nav-item nav-link active" href="user_login.php">User Login</a>
          <a class="nav-item nav-link" href="contact_us.php">Contact Us</a>
        </div>
      </div>
    </nav>
        
        <div class="container">
        <div class="col-sm-6">
           <h2>User Password Recover</h2>
            <form action="user_password_recover.php" method="post">
              <?php 
                 if(isset($_POST['submit']))
                    {
                        verify_user_data();
                    }
                ?>
               <div class="form-group">
                   <label for="username">Enter Username</label>
                   <input type="text" name="username" class="form-control" required maxlength="30">
               </div>
                
                <div class="form-group">
                  <label for="">Enter Mobile No</label> 
                  <input type="text" name="mobile_no" class="form-control" required maxlength="11">
               </div>
               
                
                <input type="submit" name="submit"class="btn btn-lg btn-primary btn-block" value="Submit">
            </form>
            
        </div>
    </div>
        
        <?php include"e-travel_footer.php"; ?>
    </div>
</body>
</html>