<?php
include 'inc/autoloader.inc.php';
require_once 'inc/drug_display.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $drug = new Drug();
    $drug_row = $drug->getDrugByID($id);

    if ($drug_row == null) {
        header("Location: drug_dashboard.php");
    }
} else {
    header("Location: drug_dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/drug_details.css" />
    <title>
        <?php
        $pageTitle = 'Drug Details';
        echo $pageTitle;
        ?>
    </title>
</head>

<body>
    <?php include "common_sections/topbar.php" ?>
    <div class="maincontainer">
        <div class="wrapper">
            <header id="drug-details-header">
                <h3>
                    <?php echo $drug_row[0]['trade_name'] ?>
                    </hd>
            </header>
            <div class="drug-info">
                <div class="drug-image">
                    <?php
                    echo generateImage($id);
                    ?>
                </div>
                <table class="drug-details">
                    <tr>
                        <th>Drug Formula</th>
                        <td>
                            <?php echo $drug_row[0]['drug_formula']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Drug Category</th>
                        <td>
                            <?php echo $drug_row[0]['drug_category']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Administration Method</th>
                        <td>
                            <?php echo $drug_row[0]['administration_method']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Dosage (mg)</th>
                        <td>
                            <?php echo $drug_row[0]['dosage_mg']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Drug Quantity</th>
                        <td>
                            <?php echo $drug_row[0]['drug_quantity']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Drug Price (Ksh)</th>
                        <td>
                            <?php echo $drug_row[0]['drug_price']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Expiry Date</th>
                        <td>
                            <?php echo $drug_row[0]['expiry_date']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td>
                            <a class="btn-update" href="update/update_drug.php?id=<?php echo $id; ?>">Update</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php include "common_sections/footer.php" ?>
</body>

</html>