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
            <a class="nav-link" href="decrypt.php">Decrypt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_notification.php?status=0">Notification(<?php echo new_notification(); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_logout.php">Logout</a>
          </li>
        </ul>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $status=$_GET['status'];
        }
        else if(isset($_POST['delete']))
        {
            $delete_id=$_POST['selected_id'];  
            global $connection;
            foreach($delete_id as $id ) 
            {
                $query="delete from user_notification where id=$id";
                $result=mysqli_query($connection,$query);
                if(!$result)
                    break; 
            }
            redirect("user_notification.php?status=1");
        }
        read_notification($status);
    if($status==0)
        echo '<h4 align="center"><a href="user_notification.php?status=1">See Older</a></h4>';
    else
        echo '<h4 align="center"><a href="user_notification.php?status=0">See Newer</a></h4>';
    ?>
    
    
    
</body>
</html>