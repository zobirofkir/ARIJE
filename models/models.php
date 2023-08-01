<?php
include "/connection/connection.php";

$create_table = $database->prepare("CREATE TABLE resto (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(120) NOT NULL,
  phone VARCHAR(120) NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  people INT NOT NULL,
  message TEXT NOT NULL
);");
$create_table->execute();

$create_contact = $database->prepare("CREATE TABLE contact (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(120) NOT NULL,
    subject VARCHAR(120) NOT NULL,
    message VARCHAR(120) NOT NULL
)");
$create_contact->execute();
?>