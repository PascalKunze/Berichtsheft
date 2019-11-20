<?php

ini_set('display_errors', true);
ini_set('default_charset', 'UTF-8');


// execution of function based on button pressed

if (isset ($_POST['action'])) {
    if ($_POST['action'] == 'Speichern') {
        $nachname = $_POST['Nachname'];
        $vorname = $_POST['Vorname'];
        $bericht = $_POST['Bericht'];
        $datum = $_POST['Datum'];

        if (!$datum || !$bericht || !$vorname || !$nachname || !$datum) {
            die("Du hast eins der Felder vergessen auszufüllen!");
        }
        createEintrag();
    }
    if ($_POST['action'] == 'Update') {
        updateEintrag();
    }
    if ($_POST['action'] == 'Löschen') {
        deleteEintrag();
    }
    if ($_POST['action'] == 'Entfernen') {
        $nachnameMA = $_POST['NachnameMA'];
        $vornameMA = $_POST['VornameMA'];

        if (!$nachnameMA || !$vornameMA) {
            die("Du hast eins der Felder vergessen auszufüllen!");
        }
        deleteMA();
    }
    if ($_POST['action'] == 'Anlegen') {
        $nachnameMA = $_POST['NachnameMA'];
        $vornameMA = $_POST['VornameMA'];

        if (!$nachnameMA || !$vornameMA) {
            die("Du hast eins der Felder vergessen auszufüllen!");
        }
        saveMA();
    }


}


//saves new Mitarbeiter with given Vor- und Nachname
function saveMA()
{
    $con = createConnection();
    $eintragMA = "INSERT INTO tbl_Mitarbeiter (Vorname, Nachname ) 
    VALUES ( '" . $_POST['VornameMA'] . "','" . $_POST['NachnameMA'] . "')";

    $eintragenMA = mysqli_query($con, $eintragMA);
    echo mysqli_error($con);
    if ($eintragenMA == true) {

        echo "Der neue Mitarbeiter wurde angelegt.";

    } else {

        echo "Der neue Mitarbeiter wurde nicht angelegt.";

    }

    closeConnection($con);
}

//deletes existing Mitarbeiter with given Vor- und Nachname
function deleteMA()
{
    $con = createConnection();
    $maid = fetchMAID2($con);

    $deleteMA = "DELETE FROM tbl_Mitarbeiter WHERE id= '" . $maid['id'] . "'";
    $deletenMA = mysqli_query($con, $deleteMA);
    echo mysqli_error($con);

    if ($deletenMA == true) {

        echo "Der Mitarbeiter wurde entfert.";


    } else {
        echo "Der Mitarbeiter wurde nicht entfert.";
    }
    closeConnection($con);
}

// creates table that shows tbl_Berichte with entities that can be edited or deleted
/*function getBerichtsheftEinträgeAsTable()
{
    $con = createConnection();
    $sql = "SELECT id, mitarbeiter_id, Bericht, Datum FROM tbl_Berichte";
    $result_table = $con->query($sql);
    if ($result_table->num_rows > 0) {
        echo "<table border='1px solid black;'>";
        echo "<tr><th> Mitarbeiter ID</th><th> Datum </th><th>Bericht</th> <th>actions</th></tr>";
        while ($row = $result_table->fetch_assoc()) {
            echo "<tr>
                    <td> " . $row["mitarbeiter_id"] . "</td>
                    <td>" . $row["Datum"] . "</td>
                    <form action='action.php' method='post'>
                      <td><input type='text' name='Bericht_tbl' value= '" . $row["Bericht"] . "'> </td> 
                      <td>

                          <input type='hidden' name='id' value='" . $row["id"] . "'>
                          <input type='submit' name='action' value='Update' >
                          <input type='submit' name='action' value='Löschen'>
                    </form>
                    </td>
                </tr>";
        }
        echo " </table>";
    } else {
        echo "Keine Berichte";
    }
    closeConnection($con);
}
*/


// closes connection to database
function closeConnection($con)
{
    $con->close();
}

// creates connection to database
function createConnection()
{
    $servername = "mysql";
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

function fetchMAID2($con)
{
    $MA_ID = "SELECT id FROM tbl_Mitarbeiter where Vorname = '" . $_POST['VornameMA'] . "' and Nachname ='" . $_POST['NachnameMA'] . "'";
    $result_maid = mysqli_query($con, $MA_ID);
    $maid = $result_maid->fetch_assoc();
    return $maid;
}

//fetch mitarbeiter_ID with given Vor- and Nachname
function fetchMAID($con)
{
    $MA_ID = "SELECT id FROM tbl_Mitarbeiter where Vorname = '" . $_POST['Vorname'] . "' and Nachname ='" . $_POST['Nachname'] . "'";
    $result_maid = mysqli_query($con, $MA_ID);
    $maid = $result_maid->fetch_assoc();
    return $maid;
}


// create a entry with given mitarbeiter id, date and report and save it into tbl_Berichte
function createEintrag()
{
    $con = createConnection();
    $maid = fetchMAID($con);
    $date = new DateTime($_POST['Datum']);
    $eintrag = "INSERT INTO tbl_Berichte (mitarbeiter_id, Bericht, Datum) 
    VALUES ( '" . $maid['id'] . "','" . $_POST['Bericht'] . "','" . $date->format('Y-m-d') . "')";


    $eintragen = mysqli_query($con, $eintrag);
    echo mysqli_error($con);


    if ($eintragen == true) {

        echo "Dein Bericht wurde gespeichert.";

    } else {

        echo "Dein Bericht wurde nicht gespeichert.";

    }

    closeConnection($con);
}

// deletes an entry from table
function deleteEintrag()
{

    $con = createConnection();

    $delete = "DELETE FROM tbl_Berichte WHERE id='" . $_POST['id'] . "'";

    $deleten = mysqli_query($con, $delete);
    echo mysqli_error($con);

    if ($deleten == true) {

        echo "Dein Bericht wurde gelöscht.";

    } else {

        echo "Dein Bericht wurde nicht gelöscht";

    }


    closeConnection($con);
}


// updates an entry from table

function updateEintrag()
{
    $con = createConnection();
    $update = "UPDATE tbl_Berichte SET Bericht = '" . $_POST['Bericht_tbl'] . "' WHERE id='" . $_POST['id'] . "'";
    $updaten = mysqli_query($con, $update);
    echo mysqli_error($con);
    if ($updaten == true) {
        echo "Dein Bericht wurde aktualisiert.";
    } else {
        echo "Dein Bericht wurde nicht aktualisiert";
    }
    closeConnection($con);
}


