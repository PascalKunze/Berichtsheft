<?php
ini_set('display_errors', true);
require_once "action.php"
?>
<html>
<head>
    <link rel="stylesheet" href="berichtsheft_css.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {

            $("#datepicker").datepicker({dateFormat: "dd.mm.yy"});
        });

    </script>

</head>
<body>
<ul class="index">
    <li><a href="index.php">Zur Hauptseite zurück</a></li>
    <li><a href="new_bericht.php">Einen neuen Bericht schreiben</a></li>
    <li><a href="New_azubi.php">Einen neuen Azubi/Mitarbeiter anlegen</a></li>
    <li><a href="all_berichte.php">Überblick über alle Berichte</a></li>
    <li><a href="bericht_suchen.php">Einen bestimmten Bericht suchen</a></li>

</ul>

<form action="action.php" method="post">


    <h2>Azubi Berichtsheft</h2>
<br>
    <br>
    <div class="newbericht">
        <p>Vorname:</p> <input type="text" name="Vorname">
        <br><br>
        <p>Nachname:</p> <input type="text" name="Nachname">
        <br><br>
        <p>Datum:</p> <input type="text" name="Datum" id="datepicker" value=".">
        <br><br>

        </p>
    <p>Bericht:</p> <textarea name="Bericht" rows="5" cols="40" class="bericht"></textarea>
    <br><br>

    <input type="submit" name="action" value="Speichern" class="btn" action>

    </div>
</form>


</body>
</html>
