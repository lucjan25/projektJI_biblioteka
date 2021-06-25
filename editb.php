<?php      
        session_start();
        include('connection.php');  
        $ISBN = $_POST['ISBN'];  
        $Tytul = $_POST['Tytul'];  
        $Autor = $_POST['Autor'];  
        $Wydawca = $_POST['Wydawca'];
          
            $ISBN = stripcslashes($ISBN);  
            $Tytul = stripcslashes($Tytul);  
            $Autor = stripcslashes($Autor);  
            $Wydawca = stripcslashes($Wydawca);
            $ISBN = mysqli_real_escape_string($conn, $ISBN);  
            $Tytul = mysqli_real_escape_string($conn, $Tytul);  
            $Autor = mysqli_real_escape_string($conn, $Autor);  
            $Wydawca = mysqli_real_escape_string($conn, $Wydawca);

            $sql = "UPDATE `ksiazka` SET `ISBN`='$ISBN', `Tytul`='$Tytul', `Autor`='$Autor', `Wydawca`='$Wydawca' WHERE `ISBN`='$ISBN'";
            if ($conn->query($sql) === TRUE) {
              echo "Rekord zaktualizowany poprawnie";
              $conn->close();
              header("Location:zbiory.php");
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              header("Location:zbiory.php?er=".$conn->error);
              $conn->close();
            }
            $conn->close();
            header("Location:zbiory.php?er=".$conn->error);
    ?>