<?php      
        session_start();
        include('connection.php');  
        $email = $_POST['email'];  
        $password = $_POST['password'];  
          
            $email = stripcslashes($email);  
            $password = stripcslashes($password);  
            $email = mysqli_real_escape_string($conn, $email);  
            $password = mysqli_real_escape_string($conn, $password);  
          
            $sql = "SELECT * FROM `czytelnik` where `e-mail` = '$email' and `haslo` = '$password'";  
            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            mysqli_close($conn);
              
            if($count == 1){  
              $_SESSION["username"] = $row['e-mail'];
              header("Location:index.php");  
            }  
            else{
                header("Location:login.php?err=1");
            }     
    ?>  