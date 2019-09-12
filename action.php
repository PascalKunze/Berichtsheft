<?php

ini_set('display_errors',true);
ini_set('default_charset','UTF-8');


$Nachname = $_POST['Nachname'];
$Bericht = $_POST['Bericht'];
$Datum = $_POST['Datum'];
$Vorname = $_POST['Vorname'];




if(!$Bericht || !$Datum  || !$Nachname || !$Vorname){
    die("Du hast eins der Felder vergessen auszufüllen!");
}


$servername = "localhost";
$username = "Pascal";
$password = "Pascalstanley03";
$db="Berichtsheft";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
mysqli_set_charset($conn,'UTF8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//table with database


/*$sql = "SELECT mitarbeiter_id, Bericht, Datum FROM tbl_Berichte";
$result_table = $conn -> query($sql);
if ($result_table -> num_rows > 0){
    while ($row = $result_table -> fetch_assoc()){
        echo "<tr><td> ". $row["mitarbeiter_id"]."</td><td> ". $row["Datum"]." </td><td>". $row["Bericht"]." </td> </tr>";
    }
    echo " </table>";
} else {
    echo "Keine Berichte";
}
$conn -> close();
*/


$MA_ID = "SELECT id FROM tbl_Mitarbeiter where Vorname = '".$Vorname."' and Nachname ='".$Nachname."'";
$result_maid =  mysqli_query($conn,$MA_ID);
$maid=$result_maid->fetch_assoc();

//----------------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------------------



$eintrag = "INSERT INTO tbl_Berichte (mitarbeiter_id, Bericht, Datum)
    VALUES ( '".$maid['id']."' ,'$Bericht' ,'$Datum' )";

$eintragen = mysqli_query($conn,$eintrag);
echo mysqli_error($conn);



if ($eintragen == true){

    echo "Dein Bericht wurde gespeichert.";
    die();


}else{
    echo "Dein Bericht wurde nicht gespeichert.";
    die();
}



die();


mysqli_close($conn);




