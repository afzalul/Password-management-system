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
            <a class="nav-link" href="join_request.php">Join request(<?php total_request(); ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_no.php">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_feedback.php">Message</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
        <br><br>
    <?php 
    
        if(isset($_POST['Delete']))
        {

            $delete_id=$_POST['delete_id'];  
            global $connection;
            foreach($delete_id as $id ) 
            {
                $query="delete from message where id=$id ";
                $result=mysqli_query($connection,$query);
                if(!$result)
                    break; 
            }
            redirect("admin_feedback.php");

        }
    ?>
    <form action="admin_feedback.php" method="post" >
        <div class="form-check">
      
        
            <table border="1" width=60%>
              <tr>
                <td align="center"><b>ID<b></td>
                <td align="center"><b>Name<b></td>
                <td align="center"><b>Mobile<b></td>
                <td align="center"><b>Message<b></td>
                <td align="center"><b>Date and Time<b></td>
                <td align="center"><b><input type="submit" name="Delete" class="btn btn-primary" value="Delete"></b></td>
             </tr> 
    <?php 
    
        global $connection;
        $query="select * from message order by  date desc ";
        $result=mysqli_query($connection,$query);
        if($result)
        {
            while ($row = mysqli_fetch_row($result))
            {
                echo '
                <tr>
                    <td align="center">'.$row[3].'</td>
                    <td align="center">'.$row[0].'</td>
                    <td align="center">'.$row[1].'</td>
                    <td align="center">'.$row[2].'</td>
                    <td align="center">'.$row[4].'</td>
                    <td align="center"><input class="form-check-input" type="checkbox" name="delete_id[]" value="'.$row[3].'"></td>
                </tr>';

            } 
            
        }
        else
        {
            echo mysqli_error($connection);
        }
    ?>
            </table><br><br>  
        </div>
    </form>
</body>
</html>