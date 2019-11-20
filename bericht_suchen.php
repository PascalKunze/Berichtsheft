<?php
ini_set('display_errors', true);
require_once "action.php"
?>
<html>
<head>
    <link rel="stylesheet" href="berichtsheft_css.css">
    <link rel="stylesheet" media="print" href="print.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>

        $(function () {

            $("#datepickerFrom").datepicker({dateFormat: "dd.mm.yy"});
            $("#datepickerTo").datepicker({dateFormat: "dd.mm.yy"});
        });


    </script>

</head>

<ul class="index">
    <li><a href="index.php">Zur Hauptseite zurück</a></li>
    <li><a href="new_bericht.php">Einen neuen Bericht schreiben</a></li>
    <li><a href="New_azubi.php">Einen neuen Azubi/Mitarbeiter anlegen</a></li>
    <li><a href="all_berichte.php">Überblick über alle Berichte</a></li>
    <li><a href="bericht_suchen.php">Einen bestimmten Bericht suchen</a></li>
</ul>
<form action="bericht_drucken.phtml" form="post">
    <?php
    if (isset($_POST['search'])) {
        $valueToSearchDateTime = new DateTime($_POST['DatumFrom']);
        $valueToSearchToDateTime = new DateTime($_POST['DatumTo']);

        // search in all table columns
        // using concat mysql function

        $query = "SELECT * FROM tbl_Berichte WHERE Datum BETWEEN '" . $valueToSearchDateTime->format('Y-m-d') . "' 
              AND '" . $valueToSearchToDateTime->format('Y-m-d') . "' ORDER BY Datum ASC ";
        $search_result = filterTable($query);

    } else {
        $query = "SELECT * FROM tbl_Berichte";
        $search_result = filterTable($query);
    }

    // function to connect and execute the query
    function filterTable($query)
    {
        $connect = createConnection();
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }


    //dropdown functions----------------------------------
    $connect = createConnection();
    $query1 = "SELECT * FROM tbl_Mitarbeiter";
    $result1 = mysqli_query($connect, $query1);


    ?>
</form>

<p class="header_print">Azubiberichte</p>
<h2>Bericht suchen</h2>
<form action="bericht_suchen.php" method="post">
    <br>
    <br>

    <p>Von:</p><input type="text" name="DatumFrom" id="datepickerFrom" value="."></p>
    <p>Bis:</p><input type="text" name="DatumTo" id="datepickerTo" value="."></p>
    <p>Welcher Azubi:</p>
    <select class="searchWorker">
        <?php while ($row1 = mysqli_fetch_array($result1)):; ?>

            <option><?php echo "" . $row1["id"] . "" ?></option>

        <?php endwhile; ?>
    </select>


    <br>
    <br>

    <input type="submit" name="search" value="Filter" class="btn"><br><br>
</form>

<table class="tbl_html">
    <?php echo "<tr><th> Mitarbeiter ID</th><th> Datum </th><th>Bericht</th> <th class='not_needed'>actions</th></tr> ";
    while ($row = mysqli_fetch_array($search_result)) {
        echo "<tr>
                    <td>" . $row["mitarbeiter_id"] . "</td>
                    <td>" . $row["Datum"] . "</td>
                    <form action='action.php' method='post'>
                      <td><input type='textarea' name='Bericht_tbl' value= '" . $row["Bericht"] . "' class='Bericht_tbl'> <p class='forPrint'> " . $row["Bericht"] . "</p> </td> 
                      <td class='not_needed'>
                          <input type='hidden' name='id' value='" . $row["id"] . "'>
                          <input type='submit' name='action' value='Update' class='btn'>
                          <input type='submit' name='action' value='Löschen' class='btn'>
                    </form>
                    </td>
                </tr>";

    }
    ?>
</table>

<button onclick="myFunction()" class="print_btn">Print this page</button>
<br><br>

<script>
    function myFunction() {
        window.print();
    }
</script>

<p class="signed">Unterschrift des Azubis:_______________________________</p><br>
<p class="signed">Unterschrift des Auaszubildenen :_______________________________</p>
</form>


</body>
</html>
