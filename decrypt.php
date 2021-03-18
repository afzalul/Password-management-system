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
            <a class="nav-link active" href="decrypt.php">Decrypt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_notification.php?status=0">Notification(<?php echo new_notification(); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_logout.php">Logout</a>
          </li>
        </ul>
    <br>
    <div class="container">  
        <div class="col-sm-6">
           
            <form action="decrypt.php" method="post" enctype="multipart/form-data">
              
               <?php 

                    if(isset($_POST['submit']))
                    {
                        $key=$_POST['key'];  
                        $id=$_POST['image_id'];  
                        global $connection;
                        $username=$_SESSION['U_username'];
                        $query="select * from image where id=$id ";
                        $result=mysqli_query($connection,$query);
                        $row = mysqli_fetch_row($result);
                        if($key!=$row[4])
                        {
                            show_error_message("Sorry, incorrect Key");
                        }
                        else
                        {
                            $encryption=$row[3];

                            // Store the cipher method 
                            $ciphering = "AES-128-CTR"; 

                            // Use OpenSSl Encryption method 
                            $iv_length = openssl_cipher_iv_length($ciphering); 
                            $options = 0; 

                            $decryption_iv = '1234567891011121'; 

                            // Store the decryption key 
                            $decryption_key = $key; 

                            // Use openssl_decrypt() function to decrypt the data 
                            $decryption=openssl_decrypt ($encryption, $ciphering,$decryption_key, $options, $decryption_iv); 
                            show_success_message($decryption);
                        }
                        
                    }
                ?>
               
                <div class="form-group">
                   <label for="key">Key</label>
                   <input type="text" name="key" class="form-control" required>
               </div>
                
                <div class="form-check">
                    <?php 
                        
                        global $connection;
                        $username=$_SESSION['U_username'];
                        $query="select * from image where username='$username' ";
                        $result=mysqli_query($connection,$query);
                        while ($row = mysqli_fetch_row($result))
                        {
                            echo '<input class="form-check-input" type="radio" name="image_id" value="'.$row[1].'" required><img src="uploads/'.$row[2].'" width="150" height="60"><br><br>';
                        } 
                    ?>
                </div>
    
                
                <input type="submit" name="submit"class="btn btn-primary" value="Decrypt">
            </form>
        </div>
        
    </div>
    
    
</body>
</html>