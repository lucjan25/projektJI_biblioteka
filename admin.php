<?php
session_start();
if (isset($_SESSION["username"])) {
  if($_SESSION['username'] != 'admin@biblioteka.example'){
    header("Location:index.php");
  }
}
else{
  header("Location:index.php");}
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
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-zbiory-tab" data-toggle="tab" href="#nav-zbiory" role="tab" aria-controls="nav-zbiory" aria-selected="true">Zbiory</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Czytelnicy</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Zwroty/odbiory</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-zbiory" role="tabpanel" aria-labelledby="nav-zbiory-tab">
        <form name="f1" action = "addbook.php" method = "POST">
          <h2>Dodaj do zbiorów</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="ISBN">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="Tytul" name="Tytul" placeholder="Tytuł">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="Autor" name="Autor" placeholder="Autor">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="Wydawca" name="Wydawca" placeholder="Wydawca">
          </div>
          <button type="submit" class="btn btn-info btn-block btn-round">Dodaj egzemplarz</button>
        </form>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <form name="f1" action = "adduser.php" method = "POST">
          <h2>Dodaj czytelnika</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="PESEL" name="PESEL" placeholder="PESEL">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="Imie" name="Imie" placeholder="Imię">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="Nazwisko" name="Nazwisko" placeholder="Nazwisko">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="e-mail" name="e-mail" placeholder="E-mail">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="telefon" name="telefon" placeholder="Numer telefonu">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
          </div>
          <button type="submit" class="btn btn-info btn-block btn-round">Dodaj czytelnika</button>
        </form>
      </div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <form>
          <h2>Przyjmij/wydaj egzemplarz ze zbiorów</h2>
          <ul>
            <li><a href="resout.php">Wydaj z rezerwacją</a></li>
            <li><a href="noresout.php">Wydaj bez rezerwacji</a></li>
            <li><a href="in.php">Przyjmij</a></li>
        </form>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>