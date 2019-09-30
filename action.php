<?php

ini_set('display_errors', true);
ini_set('default_charset', 'UTF-8');

if (!empty($_POST['Nachname'])) {
    $Nachname = $_POST['Nachname'];
    $Bericht = $_POST['Bericht'];
    $Datum = $_POST['Datum'];
    $Vorname = $_POST['Vorname'];

    if (!$Bericht || !$Datum || !$Nachname || !$Vorname) {
        die("Du hast eins der Felder vergessen auszufüllen!");
    }
}

// creates table that shows tbl_Berichte
function getBerichtsheftEinträgeAsTable()
{
    $con = createConnection();
    $sql = "SELECT mitarbeiter_id, Bericht, Datum FROM tbl_Berichte";
    $result_table = $con->query($sql);
    if ($result_table->num_rows > 0) {
        echo "<table border='1px solid black;'>";
        echo "<tr><th> Mitarbeiter ID</th><th> Datum </th><th>Bericht</th> </tr>";
        while ($row = $result_table->fetch_assoc()) {

            echo "<tr><td> " . $row["mitarbeiter_id"] . "</td><td> " . $row["Datum"] . " </td><td>" . $row["Bericht"] . " </td> </tr>";
        }
        echo " </table>";
    } else {
        echo "Keine Berichte";
    }
    closeConnection($con);
}

// closes connection to database
function closeConnection($con)
{
    $con->close();
}

// creates connection to database
function createConnection()
{
    $servername = "localhost";
    $username = "Pascal";
    $password = "Pascalstanley03";
    $db = "Berichtsheft";

    $conn = new mysqli($servername, $username, $password, $db);
    mysqli_set_charset($conn, 'UTF8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
//----------------------------------------------------------------------------------------------------------------------

//Still in progress


//should create mitarbeiter_ID with given Vor- and Nachname
function createMAID()
{
    $con = createConnection();
    $MA_ID = "SELECT id FROM tbl_Mitarbeiter where Vorname = '" . $Vorname . "' and Nachname ='" . $Nachname . "'";
    $result_maid = mysqli_query($con, $MA_ID);
    $maid = $result_maid->fetch_assoc();

    return $maid;
}


echo createMAID();

//should create a entry with given mitarbeiter id, date and report and save it into tbl_Berichte
function createEintrag(String $Bericht, String $Datum , int $maid)
{
    $maid = createMAID();

    $con = createConnection();
    $eintrag = "INSERT INTO tbl_Berichte (mitarbeiter_id, Bericht, Datum)
    VALUES ( '" . $maid['id'] . "' ,'$Bericht' ,'$Datum' )";

    $eintragen = mysqli_query($con, $eintrag);
    echo mysqli_error($con);


    if ($eintragen == true) {

        echo "Dein Bericht wurde gespeichert.";
        die();


    } else {
        echo "Dein Bericht wurde nicht gespeichert.";
        die();
    }


    die();


    closeConnection($con);;
}

//----------------------------------------------------------------------------------------------------------------------