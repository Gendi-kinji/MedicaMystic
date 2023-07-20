<?php
if(isset($_GET["id"])){
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/supervisor.class.php";

    $id = $_GET["id"];

    $supervisor = new Supervisor();
    $supervisor_row = $supervisor->getSupervisor($id);

    // Extract values: 
    $supervisor_firstname = $supervisor_row[0]['supervisor_firstname'];
    $supervisor_lastname = $supervisor_row[0]['supervisor_lastname'];
    $supervisor_phone = $supervisor_row[0]['supervisor_phone'];

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
    <link rel="stylesheet" href="../styles/form_styles/add_supervisors.css" />
    <title>Supervisor Form</title>
    <style></style>
  </head>
  <body>
  <form action="../tables/editable/manage_supervisors.php" method="GET">
      <input type="submit" value="View Supervisors Table" />
    </form>
    <form
      class="supervisor-form"
      action="../../updators/supervisor.updator.php"
      method="POST"
    >
      <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
      <header id="supervisor-form-header">
        <h3 id="supervisor-form-title">Supervisor Form</h3>
        <h4>Enter details below</h4>
      </header>
      <label for="supervisor_firstname">First Name</label>
      <input
        type="text"
        id="supervisor_firstname"
        name="supervisor_firstname"
        placeholder="First name..."
        required
        value = "<?php echo $supervisor_firstname;?>"
      />
      <label for="supervisor_lastname">Last Name</label>
      <input
        type="text"
        id="supervisor_lastname"
        name="supervisor_lastname"
        placeholder="Last name..."
        required
        value = "<?php echo $supervisor_lastname;?>"
      />
        <label for="supervisor_phone">Phone</label>
        <input 
          type="text" 
          id="supervisor_phone" 
          name="supervisor_phone" 
          list="country-codes" 
          value="<?php echo $supervisor_phone?>" 
          required
        />
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>
        <button type="submit" name="submit" value="Update">Update</button><br />
    </form>
  </body>
</html>
