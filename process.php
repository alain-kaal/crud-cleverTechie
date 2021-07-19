<?php
  session_start();
  require_once("helpers\debog.php");

  $update = false;

  // sinon default input aura des valeurs html bizzares
  $name = '';
  $location = '';

  $dbname = 'cleverTechie_crud';
    $mysqli = new mysqli("localhost", "root", "", $dbname);
    if ($mysqli->connect_error) {
        echo "Fehler bei der Verbindung: " . mysqli_connect_error();
        exit();
    }
     /* echo "Verbindung hat geklappt";
    $mysqli->close(); */
    // Insert data
    if (isset($_POST['save'])) {
        $name =  $_POST['name'];
        $location =  $_POST['location'];

        $insertQuery = "INSERT INTO data (name, location) 
        VALUES ('$name', '$location')";
        $mysqli->query($insertQuery) or die($mysqli->error);
        $_SESSION['message'] = 'record has been save';
        $_SESSION['msg_type'] = 'success';
        header('Location: index.php');
    }
    // Delete data
    if (isset($_GET['delete'])) {
        $id =  $_GET['delete'];
        $deleteQuery = "DELETE FROM data WHERE id = $id";
        $mysqli->query($deleteQuery) or die($mysqli->error);
        $_SESSION['message'] = 'record has been deleted';
        $_SESSION['msg_type'] = 'danger';
        header('Location: index.php');
    }
    // Update/Edit data
    if (isset($_GET['edit'])) {
        $id =  $_GET['edit'];
        $editQuery = "SELECT * FROM data WHERE id = $id";
        $result = $mysqli->query($editQuery)
            or die($mysqli->error);
        // $result ist ein Object
        if ($result->num_rows == 1) {
            $row = $result->fetch_array();
            $name = $row['name'];
            $location = $row['location'];
            $update = true;
        }
        /* $_SESSION['message'] = 'record has been edit';
        $_SESSION['msg_type'] = 'primary';
        header('Location: index.php'); */
    }
