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
        // Start a session
        session_start();

        // Display error messages if there are any
        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            echo '<ul id="error_msg">';
            foreach ($_SESSION['errors'] as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';

            // Clear the errors from the session
            unset($_SESSION['errors']);
        } elseif(isset($_SESSION['success']) && !empty($_SESSION['success']) && $_SESSION['success']){
            echo '<span id="success_msg">Record added successfully</span>';
        }
    ?>
    <form action="../tables/editable/manage_drugs.php" method="GET">
        <input type="submit" value="View Drugs Table">
    </form>
    <form class="drug-form" action="../process/drug.process.php" method="POST">
        <header id="drugs-form-header">
            <h3 id="drugs-form-title">Drugs Form</h3>
            <h4>Enter drug details</h4>
        </header>
        <label for="trade_name">Trade Name</label>
        <input type="text" id="trade_name" name="trade_name" placeholder="Trade name..." required>
        <label for="drug_formula">Drug Formula</label>
        <input type="text" id="drug_formula" name="drug_formula" placeholder="Formula..." required>
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
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form> 
</body>
</html>