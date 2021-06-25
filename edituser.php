<?php      
        session_start();
        include('connection.php');  
        $PESEL = $_POST['PESEL'];

        $qry = mysqli_query($conn,"SELECT * FROM `czytelnik` WHERE PESEL='$PESEL'");
        $data = mysqli_fetch_array($qry);

        $Imie = $data['Imie'];  
        $Nazwisko = $data['Nazwisko'];  
        $email = $data['e-mail'];  
        $telefon = $data['telefon'];  
        $password = $data['haslo'];
          
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
            $conn->close();

            echo "<form name='f1' action = 'editu.php' method = 'POST'>
            <h2>Dodaj czytelnika</h2>
            <div class='form-group'>
              <input type='text' class='form-control' id='PESEL' name='PESEL' placeholder='PESEL' value='$PESEL'>
            </div>
            <div class='form-group'>
              <input type='text' class='form-control' id='Imie' name='Imie' placeholder='Imię' value='$Imie'>
            </div>
            <div class='form-group'>
              <input type='text' class='form-control' id='Nazwisko' name='Nazwisko' placeholder='Nazwisko' value='$Nazwisko'>
            </div>
            <div class='form-group'>
              <input type='email' class='form-control' id='e-mail' name='e-mail' placeholder='E-mail' value='$email'>
            </div>
            <div class='form-group'>
              <input type='number' class='form-control' id='telefon' name='telefon' placeholder='Numer telefonu' value='$telefon'>
            </div>
            <div class='form-group'>
              <input type='password' class='form-control' id='password' name='password' placeholder='Hasło' value='$password'>
            </div>
            <button type='submit' class='btn btn-info btn-block btn-round'>Zapisz</button>
          </form>";
    ?>