<?php
if(isset($_GET["id"])){
  require_once "../inc/autoloader.inc.php";

    $id = $_GET["id"];

    $drug = new Drug();
    $drug_row = $drug->getDrugByID($id); 
    $drug_image = $drug->getDrugImage($id);

    // Extract values: 
    $trade_name = $drug_row[0]['trade_name'];
    $drug_formula = $drug_row[0]['drug_formula'];
    $drug_category = $drug_row[0]['drug_category'];
    $administration_method = $drug_row[0]['administration_method']; 
    $dosage_mg = $drug_row[0]['dosage_mg'];
    $drug_quantity = $drug_row[0]['drug_quantity'];
    $drug_price = $drug_row[0]['drug_price']; 
    $expiry_date = $drug_row[0]['expiry_date']; 
    $image = $drug_image[0]['image'];

    // Define the base URL for image access
    $imageBaseUrl = "http://localhost:3000/";

    // Build the image URL
    $imageURL = "";
    $imageURL = $imageBaseUrl . '/uploads/' . basename($image);

    //Starting a session to hold the id: 
    session_start(); 
    $_SESSION['id'] = $_GET["id"]; 
  } else{
    echo "Error: Drug ID not set.";
    exit();
  }
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
    <div class="maincontainer">
      <form
        class="drug-form"
        action="../../updators/drug.updator.php"
        method="POST"
      >
        <a href="../tables/editable/manage_drugs.php">View Drugs Table</a>
        <a href="../drug_dashboard.php">Back to Dashboard</a>
        <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="drugs-form-header">
          <h3 id="drugs-form-title">Drugs Form</h3>
          <h4>Enter drug details</h4>
        </header>
        <div class="form-wrapper">
          <div class="drug-image-section">
            <img
              id="drug_image_preview"
              src=<?php echo $imageURL; ?>
              alt="Drug Image"
            /><br /><br />
            <label for="drug_image">Upload drug image</label>
            <!-- 
                Input for drug image:
                - Image preview not working on pressing 'back' button on browser
                - Requires fixing if possible
            -->
            <input
              type="file"
              id="drug_image"
              name="drug_image"
              accept="image/*"
              onchange="previewImage()"
            />
            <!-- Hidden input for the current image -->
            <input
             type="hidden"
             id="current_drug_image" 
             name="current_drug_image" 
             value="<?php echo $imageURL; ?>"
            />
          </div>
          <div class="form-content">
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
            <label for="drug_category">Drug Category</label>
            <select id="drug_category" name="drug_category" value="<?php echo $drug_category?>">
              <option value="painkiller">Painkiller</option>
              <option value="antibiotic">Antibiotic</option>
              <option value="vaccine">Vaccine</option>
              <option value="antidepressant">Antidepressant</option>
              <option value="antifungal">Antifungal</option>
            </select>
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
            <button type="submit" name="submit" value="update">Update</button
            ><br />
          </div>
        </div>
      </form>
    </div>
  </body>
  <script src="../scripts/drug_image_preview.js"></script>
  <script src="../scripts/status_functions.js"></script>
</html>
