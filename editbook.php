<?php      
        session_start();
        include('connection.php');  
        $ISBN = $_POST['ISBN'];

        $qry = mysqli_query($conn,"SELECT * FROM `ksiazka` WHERE ISBN='$ISBN'");
        $data = mysqli_fetch_array($qry);

        $Tytul = $data['Tytul'];  
        $Autor = $data['Autor'];  
        $Wydawca = $data['Wydawca'];
          
            $ISBN = stripcslashes($ISBN);  
            $Tytul = stripcslashes($Tytul);  
            $Autor = stripcslashes($Autor);  
            $Wydawca = stripcslashes($Wydawca);
            $ISBN = mysqli_real_escape_string($conn, $ISBN);  
            $Tytul = mysqli_real_escape_string($conn, $Tytul);  
            $Autor = mysqli_real_escape_string($conn, $Autor);  
            $Wydawca = mysqli_real_escape_string($conn, $Wydawca);
            $conn->close();

            echo "<form name='f1' action = 'editb.php' method = 'POST'>
              <h2>Edytuj</h2>
              <div class='form-group'>
                <input type='text' class='form-control' id='ISBN' name='ISBN' placeholder='ISBN' value='$ISBN'>
              </div>
              <div class='form-group'>
                <input type='text' class='form-control' id='Tytul' name='Tytul' placeholder='Tytuł' value='$Tytul'>
              </div>
              <div class='form-group'>
                <input type='text' class='form-control' id='Autor' name='Autor' placeholder='Autor' value='$Autor'>
              </div>
              <div class='form-group'>
                <input type='text' class='form-control' id='Wydawca' name='Wydawca' placeholder='Wydawca' value='$Wydawca'>
              </div>
              <button type='submit' class='btn btn-info btn-block btn-round'>Zapisz</button>
              </form>";
    ?>