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
      <h1>Biblioteka</h1>
      <span>
        Witaj na stronie internetowej Biblioteki publicznej nr ## w _______.
      </span>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>