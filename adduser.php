<?php      
        session_start();
        include('connection.php');  
        $PESEL = $_POST['PESEL'];  
        $Imie = $_POST['Imie'];  
        $Nazwisko = $_POST['Nazwisko'];  
        $email = $_POST['e-mail'];  
        $telefon = $_POST['telefon'];  
        $password = $_POST['password'];  
          
            $PESEL = stripcslashes($PESEL);  
            $Imie = stripcslashes($Imie);  
            $Nazwisko = stripcslashes($Nazwisko);  
            $email = stripcslashes($email);  
            $telefon = stripcslashes($telefon);  
            $password = stripcslashes($password);  
            $PESEL = mysqli_real_escape_string($conn, $PESEL);  
            $Imie = mysqli_real_escape_string($conn, $Imie);  
            $Nazwisko = mysqli_real_escape_string($conn, $Nazwisko);  
            $email = mysqli_real_escape_string($conn, $email);  
            $telefon = mysqli_real_escape_string($conn, $telefon);  
            $password = mysqli_real_escape_string($conn, $password);  
          
            $sql = "INSERT INTO `czytelnik` (`PESEL`, `Imie`, `Nazwisko`, `e-mail`, `telefon`, `haslo`) VALUES ('$PESEL', '$Imie', '$Nazwisko', '$email', $telefon, '$password')";  
            if ($conn->query($sql) === TRUE) {
              echo "Rekord dodany poprawnie";
              $conn->close();
              header("Location:admin.php");
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              header("Location:admin.php?err=".$conn->error);
              $conn->close();
              
            }
            
            
    ?>  