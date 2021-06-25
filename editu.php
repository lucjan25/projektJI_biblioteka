<?php      
        session_start();
        include('connection.php');  
        $PESEL = $_POST['PESEL'];
        $Imie = $_POST['Imie'];  
        $Nazwisko = $_POST['Nazwisko'];  
        $email = $_POST['e-mail'];  
        $telefon = $_POST['telefon'];  
        $password = $_POST['password'];  

            $ISBN = stripcslashes($ISBN);  
            $Tytul = stripcslashes($Tytul);  
            $Autor = stripcslashes($Autor);  
            $Wydawca = stripcslashes($Wydawca);
            $ISBN = mysqli_real_escape_string($conn, $ISBN);  
            $Tytul = mysqli_real_escape_string($conn, $Tytul);  
            $Autor = mysqli_real_escape_string($conn, $Autor);  
            $Wydawca = mysqli_real_escape_string($conn, $Wydawca);

            $sql = "UPDATE `czytelnik` SET `PESEL`='$PESEL', `Imie`='$Imie', `Nazwisko`='$Nazwisko', `e-mail`='$email', `telefon`='$telefon', `haslo`='$password' WHERE `PESEL`='$PESEL'";
            if ($conn->query($sql) === TRUE) {
              echo "Rekord zaktualizowany poprawnie";
              $conn->close();
              header("Location:users.php");
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              header("Location:users.php?er=".$conn->error);
              $conn->close();
            }
            $conn->close();
            header("Location:users.php?er=".$conn->error);
    ?>