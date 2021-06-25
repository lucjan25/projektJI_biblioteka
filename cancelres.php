<?php      
        session_start();
        include('connection.php');  
        $PESEL = $_POST['PESEL'];
        $ISBN = $_POST['ISBN'];  
        $Data_rezerwacji = $_POST['Data_rezerwacji'];

            $PESEL = stripcslashes($PESEL);  
            $ISBN = stripcslashes($ISBN);  
            $Data_rezerwacji = stripcslashes($Data_rezerwacji);
            $PESEL = mysqli_real_escape_string($conn, $PESEL);  
            $ISBN = mysqli_real_escape_string($conn, $ISBN);  
            $Data_rezerwacji = mysqli_real_escape_string($conn, $Data_rezerwacji);

            $sql = "DELETE FROM `rezerwacje` WHERE `ISBN` = '$ISBN' AND `Data_rezerwacji` = '$Data_rezerwacji' AND PESEL = '$PESEL';";
            if ($conn->query($sql) === TRUE) {
              echo "Rekord zaktualizowany poprawnie";
              $conn->close();
              header("Location:reserved.php");
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              header("Location:reserved.php?er=".$conn->error);
              $conn->close();
            }
            $conn->close();
            header("Location:reserved.php?er=".$conn->error);
    ?>