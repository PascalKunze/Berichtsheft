<?php

ini_set('display_errors',true);


$Nachname = $_POST['Nachname'];
$Bericht = $_POST['Bericht'];
$Datum = $_POST['Datum'];
$Vorname = $_POST['Vorname'];
$MA_ID = $_POST['ma_id'];



if(!$Bericht || !$Datum  || !$Nachname || !$Vorname){
    die("Du hast eins der Felder vergessen auszufüllen!");
}

Ich bin ein neuer commit

$servername = "localhost";
$username = "Pascal";
$password = "Pascalstanley03";
$db="Berichtsheft";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$eintrag = "INSERT INTO tbl_Berichte (mitarbeiter_id, Bericht, Datum)
    VALUES ( '$MA_ID' ,'$Bericht' ,'$Datum' )";

$eintragen = mysqli_query($conn,$eintrag);
echo mysqli_error($conn);

if ($eintragen == true){

    echo "Dein Bericht wurde gespeichert.";


}else{
    echo "Dein Bericht wurde nicht gespeichert.";
}


/*$einfuegen = $erg->prepare(
    "INSERT INTO tbl_Berichte (mitarbeiter_id, Bericht, Datum)
        VALUES ( '$Bericht' ,'$Datum', );*/




