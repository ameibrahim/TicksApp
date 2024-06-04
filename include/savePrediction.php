<?php

    include "databaseConnection.php"; 

    $conn = OpenConnection();

    $id = $_POST['id'];
    $userID = $_POST['userID'];
    $date = $_POST['date'];
    $modelID = $_POST['modelID'];
    $result = $_POST['result'];
    $imageName = $_POST['imageName'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "
        INSERT INTO predictions (id, userID, date, modelID, result, imageName)
        VALUES ('$id', '$userID', '$date', '$modelID', '$result', '$imageName')
    ";

    $result = mysqli_query($conn,$query);

    if($result) echo "success";
