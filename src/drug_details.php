<?php
include 'inc/autoloader.inc.php';
require_once 'drug_display.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $pageTitle = 'Drug Details';
        echo $pageTitle;
        ?>
    </title>
</head>

<body>
    <div class="maincontainer">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo generateImage($id);
        $drug = new Drug();
        $drug_row = $drug->getDrugByID($id);
    }
    ?>
    </div>
</body>

</html>