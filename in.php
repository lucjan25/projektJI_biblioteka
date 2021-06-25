<?php      
        session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Biblioteka</title>

    <script src="Search.js"></script>
  </head>
  <body>
    <div class="container">
<?php
        include('connection.php');
        $qry1 = mysqli_query($conn,"SELECT * FROM `wypozyczenia` WHERE `Data_zwrotu` IS NULL");
        
        echo "<form name='f1' action = 'inupdate.php' method = 'POST'>
            <h2>Wydaj zarezerwowaną ksiażkę</h2>
            <div class='form-group'>
            <select type='text' class='form-control' id='PESEL-ISBN' name='PESEL-ISBN' placeholder='PESEL-ISBN'>";
            while($row = $qry1->fetch_assoc()) {
              echo "<option value='" . $row['PESEL'] ."-".$row['ISBN']."'>" . $row['PESEL'] . " - " .  $row['ISBN'] . "</option>";
            }
            echo "</select>
            </div>
            <button type='submit' class='btn btn-info btn-round'>Wydaj</button>
            <a href = 'admin.php' class='btn btn-secondary btn-round'>Wróć</a>
          </form>";
          $conn->close();
?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>