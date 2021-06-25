<?php      
        session_start();
        include('connection.php');  
        $email = $_SESSION['username'];
        $ISBN = $_POST['ISBN'];
        $dzis = date('Y-m-d');

            $email = stripcslashes($email);  
            $ISBN = stripcslashes($ISBN);
            $email = mysqli_real_escape_string($conn, $email);  
            $ISBN = mysqli_real_escape_string($conn, $ISBN); 
            

            $sql = "INSERT INTO `rezerwacje` (`ISBN`, `nr_kopii`, `PESEL`, `Data_rezerwacji`, `Data_odbioru`) VALUES ('$ISBN', (SELECT `nr_kopii` FROM `kopia` WHERE `ISBN`='$ISBN' AND Dostepna='1' LIMIT 1), (SELECT `PESEL` FROM `czytelnik` WHERE `e-mail`='$email'), '$dzis', NULL);";
            if ($conn->query($sql) === TRUE) {
              echo "Rekord wprowaszony poprawnie";
              $conn->close();
              header("Location:reserved.php");
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              header("Location:reserved.php?er=".$nr_kopii);
              $conn->close();
            }
            $conn->close();
            header("Location:reserved.php?er=".$conn->error);
    ?>