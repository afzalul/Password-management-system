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
            <a class="nav-link active" href="encrypt.php">Encrypt</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="decrypt.php">Decrypt</a>
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
           
            <form action="encrypt.php" method="post" enctype="multipart/form-data">
              
               <?php 

                    if(isset($_POST['submit']))
                    {
                        
                        $data=$_POST['data'];
                        $key=$_POST['key'];               
                        // Store a string into the variable which 
                        // need to be Encrypted 
                        $simple_string = $data; 

                        // Store the cipher method 
                        $ciphering = "AES-128-CTR"; 

                        // Use OpenSSl Encryption method 
                        $iv_length = openssl_cipher_iv_length($ciphering); 
                        $options = 0; 

                        // Non-NULL Initialization Vector for encryption 
                        $encryption_iv = '1234567891011121'; 

                        // Store the encryption key 
                        $encryption_key = $key; 

                        // Use openssl_encrypt() function to encrypt the data 
                        $encryption = openssl_encrypt($simple_string, $ciphering,$encryption_key, $options, $encryption_iv); 
                        $username=$_SESSION['U_username'];
                        $return_file_name= image_upload("uploads/",$username);
                        insert_image($return_file_name,$encryption,$key);
                    }
                ?>
               <div class="form-group">
                   <label for="data">Data</label>
                   <input type="text" name="data" class="form-control" required>
               </div>
               
                <div class="form-group">
                   <label for="key">Key</label>
                   <input type="text" name="key" class="form-control" required>
               </div>
                
                <div class="form-group">
                  <label for="iamge">Image</label> 
                  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
               </div>
                
                <input type="submit" name="submit"class="btn btn-primary" value="Encrypt">
            </form>
        </div>
        
    </div>
    
    
</body>
</html>