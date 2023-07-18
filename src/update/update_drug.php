<?php
if(isset($_GET["id"])){
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/drug.class.php";

    $id = $_GET["id"];

    $drug = new Drug();
    $drug_row = $drug->getDrugByID($id);

    // Extract values: 
    $trade_name = $drug_row[0]['trade_name']; 
    $drug_formula = $drug_row[0]['drug_formula'];
    $administration_method = $drug_row[0]['administration_method']; 
    $dosage_mg = $drug_row[0]['dosage_mg']; 
    $drug_quantity = $drug_row[0]['drug_quantity'];
    $drug_price = $drug_row[0]['drug_price']; 
    $expiry_date = $drug_row[0]['expiry_date']; 

    // Starting a session to hold the id:
    session_start(); 
    $_SESSION['id'] = $_GET["id"]; } 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/form_styles/add_drugs.css" />
  </head>
  <body>
    <form action="../view_tables/view_drugs.php" method="GET">
      <input type="submit" value="View Drugs Table" />
    </form>
    <form class="drug-form" action="../updators/drug.updator.php" method="POST">
      <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
      <header id="drugs-form-header">
        <h3 id="drugs-form-title">Drugs Form</h3>
        <h4>Enter drug details</h4>
      </header>
      <!--trade_name, drug_formula, administration_method, drug_price, 
        expiry_date-->
      <label for="trade_name">Trade Name</label>
      <input
        type="text"
        id="trade_name"
        name="trade_name"
        placeholder="Trade name..."
        value="<?php echo $trade_name;?>"
        required
      />
      <label for="drug_formula">Drug Formula</label>
      <input
        type="text"
        id="drug_formula"
        name="drug_formula"
        placeholder="Formula..."
        value="<?php echo $drug_formula;?>"
        required
      />
      <label for="administration_method">Administration Method</label>
      <input
        type="text"
        id="administration_method"
        name="administration_method"
        placeholder="Method..."
        value="<?php echo $administration_method;?>"
        required
      />
      <label for="dosage_mg">Dosage (mg)</label>
      <input
        type="number"
        min="0"
        max="9999"
        id="dosage_mg"
        name="dosage_mg"
        value="<?php echo $dosage_mg; ?>"
      />
      <label for="drug_quantity">Drug Quantity</label>
      <input
        type="number"
        min="0"
        max="9999"
        id="drug_quantity"
        name="drug_quantity"
        value="<?php echo $drug_quantity; ?>"
      />
      <label for="drug_price">Drug price</label>
      <input
        type="number"
        min="0"
        step="0.01"
        id="drug_price"
        name="drug_price"
        placeholder="Enter price..."
        value="<?php echo $drug_price;?>"
        required
      />
      <label for="expiry_date">Expiry date</label>
      <input
        type="date"
        id="expiry_date"
        name="expiry_date"
        value="<?php echo $expiry_date;?>"
      /><br />
      <button type="submit" name="submit" value="update">Update</button><br />
    </form>
  </body>
</html>
