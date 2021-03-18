<?php 
    include"functions.php";   
    include"e_travel_header.php"; 
        
?>
<body>
         <h1 id="first">Password Management System</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="e-travel%20management%20home%20page.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="admin_login.php">Admin Login</a>
         
          <a class="nav-item nav-link active" href="user_login.php">Login/Register</a>
          <a class="nav-item nav-link" href="contact_us.php">Contact Us</a>
        </div>
      </div>
    </nav>
    <br><br>
    <div class="container">  
        <div class="col-sm-6">
           <h1>Sign Up</h1>
            <form action="user_signup.php" method="post" enctype="multipart/form-data">
              
               <?php 

                    if(isset($_POST['submit']))
                    {
                        insert_new_user();
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
                <div class="form-group">
                  <label for="password">Mobile no</label> 
                  <input type="tel" name="mobile_no" pattern="^\d{3}\d{4}\d{4}$" class="form-control" required maxlength="11">
               </div>
                <div class="form-group">
                  <label for="iamge">Image</label> 
                  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
               </div>
                <input type="submit" name="submit"class="btn btn-primary" value="Apply">
            </form>
            <br>
            <a href="user_login.php">Registered?</a>
        </div>
        
    </div>
    <?php include"e-travel_footer.php"; ?>
</body>
</html>