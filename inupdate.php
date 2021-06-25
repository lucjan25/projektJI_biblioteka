<?php      
        session_start();
        include('connection.php');
        $dzis = date('Y-m-d');
        $arr = explode('-', $_POST['PESEL-ISBN']);
        $PESEL = $arr[0];
        $ISBN = $arr[1];
        $sql = "UPDATE `wypozyczenia` SET `Data_zwrotu`='$dzis' WHERE `ISBN` = '$ISBN' AND PESEL = '$PESEL' AND `Data_zwrotu` IS NULL;";
        if ($conn->query($sql) === TRUE) {
          echo "Rekord wprowaszony poprawnie";
          $conn->close();
          header("Location:admin.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          header("Location:admin.php?er=".$nr_kopii);
          $conn->close();
        }
          $conn->close();
?>