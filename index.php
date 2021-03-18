<?php 
    
    include "functions.php";
    include"e_travel_header.php";
?>
<body>
    <div id="back">
       <h1 id="first">Password Management System</h1>
       
       <!--navigation bar---->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="admin_login.php">Admin Login</a>
           
          <a class="nav-item nav-link" href="user_login.php">
            <?php  
                 if(is_logged_user()==true)
                    echo "<b><u><i>".$_SESSION['U_username']."</i></u></b>";
                else 
                    echo "User Login";
            ?></a>
            <a class="nav-item nav-link" href="contact_us.php">Contact Us</a>
        </div>
      </div>
</nav>
          <div>
              <img src="image/pass.jpg" width="1500" height="600" >
        </div>
         
        </div>
    
        <?php include"e-travel_footer.php"; ?>
    
    
</body>
</html>