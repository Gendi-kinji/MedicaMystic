<?php
// includes and requires go here
require_once '../inc/status_functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_drugs.css">
    <title>Drugs From</title>
</head>
<body>
    <?php
        print_form_status(); // print the  success/error status of the form
    ?>
    <div class="maincontainer">
        <form class="drug-form" action="../process/drug.process.php" method="POST" enctype="multipart/form-data">
            <a href="../tables/editable/manage_drugs.php">View Drugs Table</a>
            <header id="drugs-form-header">
                <h3 id="drugs-form-title">Drugs Form</h3>
                <h4>Enter drug details</h4>
            </header>
            <div class ="form-wrapper">
                <div class="drug-image-section">
                    <img id="drug_image_preview" src="../web_img/flaticon/picture.png" alt="Drug Image"><br><br>
                    <label for="drug_image">Upload drug image</label>
                    <input type="file" id="drug_image" name="drug_image" accept="image/*" onchange="previewImage()" required>
                </div>
                <div class="form-content">
                    <label for="trade_name">Trade Name</label>
                    <input type="text" id="trade_name" name="trade_name" placeholder="Trade name..." required>
                    <label for="drug_formula">Drug Formula</label>
                    <input type="text" id="drug_formula" name="drug_formula" placeholder="Formula..." required>
                    <label for="drug_category">Drug Category</label>
                    <input type="text" id="drug_category" name="drug_category" placeholder="Category..." required>
                    <label for="administration_method">Administration Method</label>
                    <input type="text" id="administration_method" name="administration_method" placeholder="Method..." required>
                    <label for="dosage_mg">Dosage (mg)</label>
                    <input type="number" min="0" max ="9999" id="dosage_mg" name="dosage_mg">
                    <label for="drug_quantity">Drug Quantity</label>
                    <input type="number" min="0" max ="9999" id="drug_quantity" name="drug_quantity">
                    <label for="drug_price">Drug price (Ksh)</label>
                    <input type="number" min="0" step="0.01" id="drug_price" name="drug_price" placeholder="Enter price..." required>
                    <label for="expiry_date">Expiry date</label>
                    <input type="date" id="expiry_date" name="expiry_date"><br>
                </div>
            </div>
            <button type="submit" name="submit" value="submit">Submit</button><br>
        </form> 
    </div>
</body>
<script>
    function previewImage(){
        const inputFile = document.getElementById('drug_image');
        const preview = document.getElementById('drug_image_preview');
        const file = inputFile.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result; // set the image source to the uploaded image
            console.log(e.target.result); // display the image source
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
</html>