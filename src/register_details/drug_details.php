<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drugs form</title>
    <link rel="stylesheet" href="../styles/form_styles/add_drugs.css">
</head>
<body>
    <form action="../view_tables/view_drugs.php" method="GET">
        <input type="submit" value="View Drugs Table">
    </form>
    <form class="drug-form" action="../process/drug.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="drugs-form-header">
            <h3 id="drugs-form-title">Drugs Form</h3>
            <h4>Enter drug details</h4>
        </header>
        <!--trade_name, drug_formula, administration_method, drug_price, 
        expiry_date-->
        <label for="trade_name">Trade Name</label>
        <input type="text" id="trade_name" name="trade_name" placeholder="Trade name..." required>
        <label for="drug_formula">Drug Formula</label>
        <input type="text" id="drug_formula" name="drug_formula" placeholder="Formula..." required>
        <label for="administration_method">Administration Method</label>
        <input type="text" id="administration_method" name="administration_method" placeholder="Method..." required>
        <label for="drug_price">Drug price</label>
        <input type="number" min="0" step="0.01" id="drug_price" name="drug_price" placeholder="Enter price..." required>
        <label for="expiry_date">Expiry date</label>
        <input type="date" id="expiry_date" name="expiry_date"><br>
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form> 
</body>
</html>