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
            <a class="nav-link active" href="join_request.php">Join request(<?php total_request(); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_no.php">User</a>
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
            <form action="join_request.php" method="post">
                <li>
                   <input type="text" name="search"  placeholder="enter search keyword">
                   <input type="submit" name="Search" value="Search">
                </li> 
            </form>
        </ul>
        
    <?php 
        
        if(isset($_POST['Search']))
        {
            search_join_request();
        }
        else if(isset($_POST['DO']))
        {
            $operation=$_POST['operation'];
            echo $operation;
            $selected_username=$_POST['selected_username'];
            global $connection;
            foreach($selected_username as $username)
            {
                if($operation=="delete") 
                {
                    $query="delete from join_request where username='$username' "; 
                    $result=mysqli_query($connection,$query);
                }
                else if($operation=="add")
                {
                    $query1="select * from join_request where username='$username' ";
                    $read_result=mysqli_query($connection,$query1);
                    $read_row=mysqli_fetch_row($read_result);
                    $admin=$_SESSION['username'];
                    $query2="insert into user values('$read_row[0]','$read_row[1]','$read_row[2]','$read_row[3]','$admin','$read_row[4]')"; 
                    $result=mysqli_query($connection,$query2);
                    $query3="delete from join_request where username='$username' ";
                    $result=mysqli_query($connection,$query3);
                }
            }
            redirect("join_request.php");
        }
        else
         read_join_request();
    ?>
    <?php include"e-travel_footer.php"; ?>
</body>
</html>