<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location:index.php");
  }
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
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand active" href="index.php">Biblioteka</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="info.php">O bibliotece</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="zbiory.php">Zbiory</a>
            </li>
          <?php 
          if (isset($_SESSION["username"])) {
            if($_SESSION['username'] == 'admin@biblioteka.example'){
              echo "<li class='nav-item'> <a class='nav-link' href='users.php'>Czytelnicy</a></li>
              <li class='nav-item'> <a class='nav-link' href='admin.php'>Panel administratora</a></li>";
            }
            else{
              echo "<li class='nav-item'> <a class='nav-link' href='borrowed.php'>Pożyczone książki</a></li>
              <li class='nav-item'> <a class='nav-link' href='reserved.php'>Zarezerwowane książki</a></li>";
            }
            echo "<li class='nav-item'> <a class='nav-link' href='logout.php'>Wyloguj się</a></li>";
          }
          else{
            echo "<li class='nav-item'> <a class='nav-link' href='login.php'>Zaloguj się</a></li>";
          }
          ?>
            
          </ul>
      </nav>
    </div>


    <div class="container">
      <h2>Pożyczone książki</h2>
      <input type="text" id="inputContent" onkeyup="Search()" placeholder="Szukaj">
        <div class="container">
      <?php
        $email = $_SESSION["username"];
        include('connection.php');
        $sql = "SELECT `wypozyczenia`.`ISBN`,`wypozyczenia`.`Data_pozyczenia`,`wypozyczenia`.`Data_zwrotu`,
        `ksiazka`.`Tytul`,`ksiazka`.`Autor`,`ksiazka`.`Wydawca` FROM `czytelnik`,`wypozyczenia`,`kopia`,`ksiazka`
        where `czytelnik`.`PESEL` = `wypozyczenia`.`PESEL`
        and `czytelnik`.`e-mail` = '$email'
        and `wypozyczenia`.`ISBN` = `kopia`.`ISBN`
        and `kopia`.`ISBN` = `ksiazka`.`ISBN` ORDER BY `wypozyczenia`.`Data_pozyczenia` DESC;";
        $result = mysqli_query($conn,$sql);
        echo '<table class="table" id="ksiazkiTab">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Data wypożyczenia</th>
                <th scope="col">Data zwrotu</th>
                <th scope="col">ISBN</th>
                <th scope="col">Tytuł</th>
                <th scope="col">Autor</th>
                <th scope="col">Wydawca</th>
           </tr>
           </thead>';
           while($row = $result->fetch_assoc()) {
          echo '<tr>
              <td>' . $row['Data_pozyczenia'] . '</td>
              <td>' . $row['Data_zwrotu'] . '</td>
              <td>' . $row['ISBN'] . '</td>
              <td>' . $row['Tytul'] . '</td>
              <td>' . $row['Autor'] . '</td>
              <td>' . $row['Wydawca'] . '</td>
          </tr>';
        }
        mysqli_close($conn);
      ?>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>