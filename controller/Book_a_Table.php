<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
include "/home/voodoo/Desktop/php_Restaurant/connection/connection.php";
// include "/home/voodoo/Desktop/php_Restaurant/models/models.php";

if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $people = $_POST["people"];
    $message = $_POST["message"];

    $insert_data = $database->prepare("INSERT INTO resto(name, email, phone, date, time, people, message) VALUES (:name, :email, :phone, :date, :time, :people, :message)");
    $insert_data->bindParam(":name", $name);
    $insert_data->bindParam(":email", $email);
    $insert_data->bindParam(":phone", $phone);
    $insert_data->bindParam(":date", $date);
    $insert_data->bindParam(":time", $time);
    $insert_data->bindParam(":people", $people);
    $insert_data->bindParam(":message", $message);

    try {
        $insert_data->execute();
        $success = "Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!";
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
// Include the view file
include "/home/voodoo/Desktop/ARIJ/views/reserv.html";
?>

