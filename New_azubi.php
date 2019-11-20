<?php
ini_set('display_errors', true);
require_once "action.php"
?>
<html>
<head>
    <link rel="stylesheet" href="berichtsheft_css.css">

</head>
<body>
<ul class="index">
    <li><a href="index.php">Zur Hauptseite zurück</a></li>
    <li><a href="new_bericht.php">Einen neuen Bericht schreiben</a></li>
    <li><a href="New_azubi.php">Einen neuen Azubi/Mitarbeiter anlegen</a></li>
    <li><a href="all_berichte.php">Überblick über alle Berichte</a></li>
    <li><a href="bericht_suchen.php">Einen bestimmten Bericht suchen</a></li>
</ul>
<h2>Azubis</h2>

<form action="action.php" method="post">
    <br>
    <br>
    <div class="newazubi">
        <p>Vorname:</p> <input type="text" name="VornameMA">
        <br><br>
        <p>Nachname:</p> <input type="text" name="NachnameMA">
        <br><br>
        <input type="submit" name="action" value="Anlegen" class="btn"> <input type="submit" name="action"
                                                                               value="Entfernen" class="btn"><br><br>
    </div>
    >
</form>


</body>
</html>
