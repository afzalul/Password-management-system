<?php include_once "db.php";
    session_start();
    ob_start();
    
/*____ADMIN FUNCTION______*/ 

   function login_verification_admin()
    {
        global $connection;
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password=encrypt($password);
        if ( bool_login_verification($username,$password,'admin') )
        {
            $_SESSION['username']=$username;
            redirect("admin_homepage.php");
        }
        else
        {
            show_error_message("Incorrect Username or Password");
        }   
    }

    function update_admin()
    {
        global $connection;
        $old_username=$_SESSION['username'];
        $old_password=$_POST['old_password'];
        $new_username=$_POST['new_username'];
        $new_password=$_POST['new_password'];
        $confirm_new_password=$_POST['confirm_new_password'];
        $old_password=encrypt($old_password);
        $flag=bool_login_verification($old_username,$old_password,'admin');
        if($flag)
        { 
            if($confirm_new_password==$new_password)
            {
                $new_password=encrypt($new_password);
                $query="SELECT * FROM admin WHERE username='$new_username'";
                $read_result=mysqli_query($connection,$query);
                if(mysqli_num_rows($read_result)<=1)
                {
                    $update="UPDATE admin SET username='$new_username',password='$new_password' WHERE username='$old_username'";
                    $update_result=mysqli_query($connection,$update);
                    
                    if($update_result)
                    {
                        show_success_message("Update successful");
                    }
                    else   
                    {
                        show_error_message("Update failed");
                    }
                }
                else
                {
                     show_error_message("New username already taken");
                }
                
            }
            else
            {   
                    show_error_message("New password mismatch");
            }
        }
        else
        {
            show_error_message("Wrong old username or password");
        }
    }
    

    function insert_new_admin()
    {
         global $connection;
        $re_password= $_POST['re_password'] ;
        $password= $_POST['password'] ;
       if($password==$re_password)
        {
            $full_name=$_POST['full_name'];
            $username=$_POST['username'];
        
            $query="SELECT * FROM admin WHERE username='$username'";
            $read_result=mysqli_query($connection,$query);
            if(mysqli_num_rows($read_result)==0)
            {
                $encrypted_password=encrypt($password);
                $query="INSERT INTO admin(name,username,password) ";
                $query .="VALUES ('$full_name','$username','$encrypted_password')";
                $insert_result=mysqli_query($connection,$query);
                
                if($insert_result)
                {
                    show_success_message("Registration Succesful.");
                }
                else
                {
                    show_error_message("registration failed.");
                }
            
            }
            else
            {
                show_error_message("Username already taken,Please enter another Username.");
            }
        }
        else
        {
            show_error_message("Password mismatch");
        }
        
        
    }
/*_____________START OF JOIN REQUEST FUNCTION____________*/


    function total_request()
    {
        global $connection;
        $query="select * from join_request"; 
        $result=mysqli_query($connection,$query);
        $total=mysqli_num_rows($result);
        echo $total;
    }

    function read_join_request()
    {
        global $connection;
        $query="select * from join_request"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
            echo '<form action="join_request.php" method="post">
            <table border="1" width=60%>
             <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Mobile No</th>
                <th>Image Name</th>
                <th>
                    <select name="operation">
                      <option value="add">ADD</option>
                      <option value="delete">DELETE</option>
                    </select>
                    <input type="submit" name="DO" class="btn btn-primary" value="DO">
                </th>
            </tr>';
            while ($row = mysqli_fetch_row($result))
            {
                
                
                echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>0'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td><input class="form-check-input" type="checkbox" name="selected_username[]" value="'.$row[1].'"></td>
                </tr>';
            } 
            echo'</table><br><br>
            
            </form>';  
        }
        else
        {
                show_error_message("read failed.");
                echo mysqli_error($connection);
        }
    }

    function search_join_request()
    {
        global $connection;
        $search=$_POST['search'];
        $query="select * from join_request where username like '%$search%' or name like '%$search%' or mobile_no like '%$search%'"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
             echo '<form action="join_request.php" method="post">
            <table border="1" width=60%>
             <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Mobile No</th>
                <th>Image Name</th>
                <th>
                    <select name="operation">
                      <option value="add">ADD</option>
                      <option value="delete">DELETE</option>
                    </select>
                    <input type="submit" name="DO" class="btn btn-primary" value="DO">
                </th>
            </tr>';
            while ($row = mysqli_fetch_row($result))
            {
                echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>0'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td><input class="form-check-input" type="checkbox" name="selected_username[]" value="'.$row[1].'"></td>
                </tr>';
            } 
            echo'</table><br><br>
            </form>';  
        }
        else
        {
                show_error_message("read failed.");
                echo mysqli_error($connection);
        }
    }
/*_____________END OF JOIN REQUEST FUNCTION____________*/


/*____END OF ADMIN FUNCTION_____*/



/*____START OF USER FUNCTION_____*/


    function login_verification_user()
    {
        global $connection;
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password=encrypt($password);
        if ( bool_login_verification($username,$password,'user') )
        {
            $_SESSION['U_username']=$username;
            redirect("user_homepage.php"); 
        }
        else
        {
            show_error_message("Incorrect Username or Password");
        }   
    }

    function read_user()
    {
        global $connection;
        $query="select * from user"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
            echo '<table border="1" width=60%>
             <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Mobile No</th>
                <th>Admin username</th>
            </tr>';
            $st=' " .';
            while ($row = mysqli_fetch_row($result))
            {
                echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>0'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                </tr>';
            } 
            echo'</table><br><br>';  
        }
        else
        {
                show_error_message("read failed.");
                echo mysqli_error($connection);
        }
    }

    function search_user()
    {
        global $connection;
        $search=$_POST['search'];
        $query="select * from user where username like '%$search%' or name like '%$search%' or mobile_no like '%$search%' or admin_username like '%$search%'"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
            echo '<table border="1" width=60%>
             <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Mobile No</th>
                <th>Admin_username</th>
            </tr>';
            $st=' " .';
            while ($row = mysqli_fetch_row($result))
            {
                echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>0'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                </tr>';
            } 
            echo'</table><br><br>';  
        }
        else
        {
                show_error_message("search failed.");
                echo mysqli_error($connection);
        }
    }

    function verify_user_data()
    {
        global $connection;
        $username=$_POST['username'];
        $mobile_no=$_POST['mobile_no'];
        $mobile_no = ltrim($mobile_no, '0');
        $query="select * from user where username='$username' and mobile_no='$mobile_no' ";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)==1)
        {
            redirect("user_reset_password.php?username=".$username);
        }
        else
        {
            show_error_message("No Data found.");
        }
    }
    
    function reset_password()
    { 
        global $connection;
        $re_password= $_POST['confirm_password'] ;
        $password= $_POST['password'] ;
        $username=$_POST['username'] ;
        if($password==$re_password)
        {
            $password=encrypt($password);
            $query="update user set password='$password' where username='$username' ";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                show_success_message("Password Reset Successful.");
            
                header( "refresh:2;url=user_login.php" );
            }
            else
            {
                show_error_message("Password Reset Failed.");
            }
        }
        else
        {
            show_error_message("Password mismatch");
        }
            
    }
    /*####adding new user into db####*/
    function insert_new_user()
    {
         global $connection;
        $re_password= $_POST['re_password'] ;
        $password= $_POST['password'] ;
       if($password==$re_password)
        {
            $full_name=$_POST['full_name'];
            $username=$_POST['username'];
            $mobile_no=$_POST['mobile_no'];
            $file="default.jpg";
            $query1="SELECT * FROM join_request WHERE username='$username' or mobile_no='$mobile_no'";
            $read_result1=mysqli_query($connection,$query1);
            $query2="SELECT * FROM user WHERE username='$username' or mobile_no='$mobile_no'";
            $read_result2=mysqli_query($connection,$query2);
            if(mysqli_num_rows($read_result1)==0 and mysqli_num_rows($read_result2)==0)
            {
                    $encrypted_password=encrypt($password);
                    
                    $return_file_name= image_upload("profile_pic/",$username);
                    if($return_file_name!=NULL)
                        $file=$return_file_name;
                    
                    $query="INSERT INTO join_request";
                    $query .=" VALUES ('$full_name','$username','$encrypted_password',$mobile_no,'$file') ";
                    $insert_result=mysqli_query($connection,$query);
                
                    if($insert_result)
                    {
                        show_success_message("Registration Succesful & Account will be active soon");
                    }
                    else
                    {
                        show_error_message("registration failed.");
                        echo mysqli_error($connection);
                    }
            
            }
            else
            {
                show_error_message("Username already taken or mobile no registered");
            }
        }
        else
        {
            show_error_message("Password mismatch");
        }
        
    }

    function update_user()
    {
        global $connection;
        $old_username=$_SESSION['U_username'];
        $old_password=$_POST['old_password'];
        $new_username=$_POST['new_username'];
        $new_password=$_POST['new_password'];
        $confirm_new_password=$_POST['confirm_new_password'];
        $old_password=encrypt($old_password);
        $flag=bool_login_verification($old_username,$old_password,'user');
        if($flag)
        { 
            if($confirm_new_password==$new_password)
            {
                $new_password=encrypt($new_password);
                $query="SELECT * FROM user WHERE username='$new_username'";
                $read_result=mysqli_query($connection,$query);
                if(mysqli_num_rows($read_result)<=1)
                {
                    $row=mysqli_fetch_row($read_result);
                    $old_image=$row[5];
                    $new_image=image_upload("profile_pic/",$new_username);
                    if($new_image!=NULL)
                        $old_image=$new_image;
                    $update="UPDATE user SET username='$new_username',password='$new_password',image_name='$old_image' WHERE username='$old_username'";
                    $update_result=mysqli_query($connection,$update);
                    
                    if($update_result)
                    {
                        show_success_message("Update successful");
                        $message="You Have Updated Your Profile At ".date("Y-m-d");
                        $query="insert into user_notification values('$old_username','','$message','0') ";
                        $result=mysqli_query($connection,$query);
                    }
                    else   
                    {
                        show_error_message("Update failed");
                    }
                }
                else
                {
                     show_error_message("New username already taken");
                }
                
            }
            else
            {   
                    show_error_message("New password mismatch");
            }
        }
        else
        {
            show_error_message("Wrong old password");
        }
    }

    function new_notification()
    {
        global $connection;
        $username=$_SESSION['U_username'];
        $query="select * from user_notification where U_username='$username' and status='0' ";
        $result=mysqli_query($connection,$query);
        return mysqli_num_rows($result);
    }

    function read_notification($status)
    {
        global $connection;
        $username=$_SESSION['U_username'];
        $query="select * from user_notification where U_username='$username' and status='$status' ";
        $result=mysqli_query($connection,$query);
        if($result)
        {
            $isempty=mysqli_num_rows($result);
            if($isempty==0)
            {
                echo '<br><br><h4 align="center">No Notification</h4>';
            }
            else
            {
                echo '<br><br>
            <form action="user_notification.php" method="post">
            <table border="1" width=60%>
             <tr>
                <th>SN</th>
                <th>Message</th>
                <th><input type="submit" name="delete" class="btn btn-primary" value="Delete"></th>
            </tr>'; 
            }
            $i=1;
            while($row=mysqli_fetch_row($result))
            {
                //changing status
                $stat_change="update user_notification set status='1' where id='$row[1]' ";
                $stat_result=mysqli_query($connection,$stat_change);
                
                echo '
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$row[2].'</td>
                    <td><input class="form-check-input" type="checkbox" name="selected_id[]" value="'.$row[1].'"></td>
                </tr>';
                $i++;
            } 
            echo'</table><br><br>
            </form>';  
        }
    }

    function insert_image($target_file,$data,$key)
    {
        global $connection;
        $username=$_SESSION['U_username'];
        $query="insert into image values('$username',NULL,'$target_file','$data','$key') ";
        $result=mysqli_query($connection,$query);
    }
    
/*_____END OF USER FUNCTION______*/


/*_______COMMON FUNCTION________*/


    /*####Redirect to new Page####*/
    function redirect($address)
    {
        return header("Location: http://localhost/demo/PMS/$address");
    }

    /*####showing error message####*/
    function show_error_message($error)
    {
        echo'<div class="alert alert-danger" role="alert">'.$error.'</div>';
    }

    /*####showing success message####*/
    function show_success_message($success)
    {
        echo'<div class="alert alert-success" role="alert">'.$success.'</div>';
    }
    function info_view($info)
    {
        echo'<div class="alert alert-dark" role="alert">'.$info.'</div>';
    }
    /*####encrypt password####*/
    function encrypt($password)
    {
        $salt="bangladesh";
        $password=crypt($password,$salt);
        return $password;
    }

    /*####login verification###*/
    function bool_login_verification($username,$password,$table_name)
    {
        global $connection;
        $query="SELECT * FROM $table_name WHERE username='$username' and password='$password'";
        $read_result=mysqli_query($connection,$query);
        if ( mysqli_num_rows($read_result)==1)
        {
            return true;
        }
        else
        {
           return false;
        }   
    }

    function is_logged_in()
    {
        if(isset($_SESSION['username']))
            return true;
        else
            return false;
    }

    function is_logged_user()
    {
        if(isset($_SESSION['U_username']))
            return true;
        else
            return false;
    }
function image_upload($target_dir,$username)
{
    $file_name=basename($_FILES["fileToUpload"]["name"]);
    $return_file_name="";
    if($file_name!=NULL)
    {
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) 
        {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else 
        {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) 
        {
            show_error_message("Sorry, your file is too large.");
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) 
        {
            show_error_message("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
            show_error_message("Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
        else 
        {
            $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $newfilename=$username. $newfilename;
            $return_file_name=$newfilename;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. $newfilename)) 
            {
                show_success_message("Data uploaded successfully");
                //echo "The image ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

            }
            else 
                show_error_message("Sorry, there was an error uploading your file.");
        }

    }
    return $return_file_name;
}

function show_user_image()
{
    global $connection;
    $username= $_SESSION['U_username']; 
    echo $username."   "; 
    $query="select image_name from user where username='$username'"; 
    $result=mysqli_query($connection,$query);
    $row = mysqli_fetch_row($result);
    echo '<img src="profile_pic/'.$row[0].'" width="150" height="120" >';
}
/*_____END OF COMMON FUNCTION____*/

?>
