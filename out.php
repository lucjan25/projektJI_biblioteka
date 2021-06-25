<?php      
        session_start();
        include('connection.php');
        $dzis = date('Y-m-d');
        if (!empty($_POST['PESEL-ISBN']))
        {
          $arr = explode('-', $_POST['PESEL-ISBN']);
          $PESEL = $arr[0];
          $ISBN = $arr[1];
          $sql = "UPDATE `rezerwacje` SET `Data_odbioru`='$dzis' WHERE `ISBN` = '$ISBN' AND PESEL = '$PESEL' AND `Data_odbioru` IS NULL;";
          if ($conn->query($sql) === TRUE) {
            echo "Rekord wprowaszony poprawnie";
            $conn->close();
            header("Location:admin.php");
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location:admin.php?er=".$nr_kopii);
            $conn->close();
          }
        }
        else
        {
          $PESEL = $_POST['PESEL'];
          $ISBN = $_POST['ISBN'];
        }
        
        $sql1 = "INSERT INTO `wypozyczenia` (`ISBN`, `nr_kopii`, `PESEL`, `Data_pozyczenia`, `Data_zwrotu`) VALUES ('$ISBN', (SELECT `nr_kopii` FROM `kopia` WHERE `ISBN`='$ISBN' AND Dostepna='1' LIMIT 1), '$PESEL', '$dzis', NULL);";
        if ($conn->query($sql1) === TRUE) {
          echo "Rekord wprowaszony poprawnie";
        } else {
          echo "Error: " . $sql1 . "<br>" . $conn->error;
          header("Location:admin.php?er=".$nr_kopii);
          $conn->close();
        }
        $sql2 = "UPDATE `kopia` SET `Dostepna`='0' WHERE `ISBN` = '$ISBN' AND `nr_kopii` = (SELECT `nr_kopii` FROM `kopia` WHERE `ISBN`='$ISBN' AND Dostepna='1' LIMIT 1);";
            if ($conn->query($sql2) === TRUE) {
              echo "Rekord wprowaszony poprawnie";
              $conn->close();
              header("Location:admin.php");
            } else {
              echo "Error: " . $sql2 . "<br>" . $conn->error;
              header("Location:admin.php?er=".$nr_kopii);
              $conn->close();
            }
            echo "Error: " . $sql2 . "<br>" . $conn->error;
            header("Location:admin.php?er=".$nr_kopii);
            $conn->close();
    ?>  