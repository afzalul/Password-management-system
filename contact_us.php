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
          <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="admin_login.php">Admin Login</a>
           
          <a class="nav-item nav-link" href="user_login.php">
            <?php  
                 if(is_logged_user()==true)
                    echo "<b><u><i>".$_SESSION['U_username']."</i></u></b>";
                else 
                    echo "User Login";
            ?></a>
             <a class="nav-item nav-link active" href="contact_us.php">Contact Us</a>
        </div>
      </div>
    </nav>
        <br><br>
        
         <div class="container">
        <div class="col-sm-6">
           
            <form action="contact_us.php" method="post">
              <?php    
                    if(isset($_POST['submit']))
                    {
                        global $connection;
                        $name=$_POST['name'];
                        $mobile=$_POST['mobile_no'];
                        $mgs=$_POST['mgs'];
                        $date=date("y.m.d");
                        $time=date('h:i:s A', time()+14400); 
                        $date=$date." ".$time;
                        $query="insert into message values('$name','$mobile','$mgs','','$date') ";
                        $result=mysqli_query($connection,$query);
                        if($result)
                        {
                           show_success_message("We received your message."); 
                        }
                        else
                        {
                            echo mysqli_error($connection);
                        }
                    }
                ?>
               <div class="form-group">
                   <label for="username">Name</label>
                   <input type="text" name="name" class="form-control" required>
               </div>
                
                <div class="form-group">
                  <label for="">Mobile No</label> 
                  <input type="text" name="mobile_no" class="form-control" pattern="^\d{3}\d{4}\d{4}$" required>
               </div>
               <div class="form-group">
                   <label for="username">Message</label>
               </div>
                <textarea rows="4" cols="72" name="mgs" placeholder="Enter your message" maxlength="200"></textarea>
                <div class="form-group">
                   <label></label>
               </div>
                <input type="submit" name="submit"class="btn btn-lg btn-primary btn-block" value="Send">
            </form>
        </div>
    </div>
         <br>
          
        <?php include"e-travel_footer.php"; ?>
    </div>
    
    
</body>
</html>