<?php
if(isset($_GET["id"])){
  require_once "../inc/autoloader.inc.php";

    $id = $_GET["id"];

    $pharmaceutical = new Pharmaceutical();
    $pharmaceutical_row = $pharmaceutical->getPharmaceutical($id);

    // Extract values: 
    $company_name = $pharmaceutical_row[0]['company_name'];
    $company_address = $pharmaceutical_row[0]['company_address'];
    $company_phone = $pharmaceutical_row[0]['company_phone'];

    // Starting a session to hold the id:
    session_start();
    $_SESSION['id'] = $_GET["id"];

    } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="../styles/form_styles/add_pharmaceutical.css"
    />
    <title>Pharmaceutical Form</title>
  </head>
  <body>
  <form action="../tables/editable/manage_pharmaceutical.php" method="GET">
      <input type="submit" value="View Pharmaceutical Table" />
    </form>
    <form
      class="pharmaceutical-form"
      action="../../updators/pharmaceutical.updator.php"
      method="POST"
    >
      <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
      <header id="pharmaceutical-form-header">
        <h3 id="pharmaceutical-form-title">Pharmaceutical Form</h3>
        <h4>Enter details below</h4>
      </header>
      <label for="company_name">Company Name</label>
      <input
        type="text"
        id="company_name"
        name="company_name"
        placeholder="Pharmaceutical name..."
        required
        value = "<?php echo $company_name?>"
      />
      <label for="company_address">Address</label>
      <input
        type="text"
        id="company_address"
        name="company_address"
        placeholder="Address..."
        required
        value = "<?php echo $company_address?>"

      />
      <label for="company_phone">Phone</label>
      <input
        type="text"
        id="company_phone"
        name="company_phone"
        list="country-codes"
        required
        value = "<?php echo $company_phone?>"

      />
      <datalist id="country-codes">
        <option value="+254">Kenya</option>
        <option value="+255">Tanzania</option>
        <option value="+256">Uganda</option></datalist
      ><br />
      <button type="submit" name="submit" value="Update">Update</button><br />
    </form>
  </body>
</html>
