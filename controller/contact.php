<?php
// include "/home/voodoo/Desktop/php_Restaurant/connection/connection.php";
include "/home/voodoo/Desktop/php_Restaurant/connection/connection.php";

if (isset($_POST["contact"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $insert_contact = $database->prepare("INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
    $insert_contact->bindParam(":name", $name);
    $insert_contact->bindParam(":email", $email);
    $insert_contact->bindParam(":subject", $subject);
    $insert_contact->bindParam(":message", $message);
    $insert_contact->execute();

    try {
        $insert_contact->execute();
        $successe = "Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!";
    } catch (PDOException $e) {
        $errore = "Error: " . $e->getMessage();
    }

}

include "/home/voodoo/Desktop/ARIJ/views/contact.html";
?>
