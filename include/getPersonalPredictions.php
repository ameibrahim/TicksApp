<?php

    session_start();

    include "databaseConnection.php"; 

    $conn = OpenConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userID = $_POST['userID']; // Hapa kijana hapa.

    if($userID){

        $query = "
            SELECT * FROM `predictions`
            INNER JOIN models ON models.id = predictions.modelID
            WHERE userID = '$userID'
            LIMIT 4
        ";

        $coursesResult = mysqli_query($conn,$query);
        $courses = mysqli_fetch_all($coursesResult,MYSQLI_ASSOC);

        echo json_encode($courses);

    }
    else {
        echo "error";
    }