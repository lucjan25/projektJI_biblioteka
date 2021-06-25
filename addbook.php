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

            $result=mysqli_query($conn,"SELECT COUNT(*) as total from `ksiazka` WHERE `ISBN` = '$ISBN'");
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            if ($count == 0)
            {
              $sql1 = "INSERT INTO `ksiazka` (`ISBN`, `Tytul`, `Autor`, `Wydawca`) VALUES ('$ISBN', '$Tytul', '$Autor', '$Wydawca')";
              $sql2 = "INSERT INTO `kopia` (`ISBN`, `nr_kopii`, `Dostepna`) VALUES ('$ISBN', 0, 1)";
              if ($conn->query($sql1) === TRUE AND $conn->query($sql2) === TRUE) {
                echo "Rekordy dodane poprawnie";
                $conn->close();
                header("Location:admin.php");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                header("Location:admin.php?er=".$conn->error);
                $conn->close();
              }
            }
            else
            {
              $sql = "INSERT INTO `kopia` (`ISBN`, `nr_kopii`, `Dostepna`) VALUES ('$ISBN', $count, 1);";
              if ($conn->query($sql) === TRUE) {
                echo "Rekord dodany poprawnie";
                $conn->close();
                header("Location:admin.php");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                header("Location:admin.php?er=".$conn->error);
                $conn->close();
              }
            }
            $conn->close();
            header("Location:admin.php?er=".$conn->error);
                
             
            
    ?>