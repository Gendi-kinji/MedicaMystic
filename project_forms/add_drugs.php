<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="/styles.css">-->
    <title>Drugs Form</title>
    <style>
        body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background: aliceblue;
        }
        form {
            margin: 0% auto;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 20px;
            width: 360px;
            align-items: center;
            background: linear-gradient(176deg, rgb(49, 66, 124), #22c3ef);
        }
        #drugs-form-header{
            text-align: center;
        }
        h4{
            font-style: italic;
            font-weight: normal;
        }
        #button-submit:hover{
            background: rgb(110, 106, 106);
            color: white;
        }
    </style>
</head>
<body>
<center>
        <?php
        /* This php script processes the POST request to get the values from the form and 
        insert them as a row in the db */

        // trade_name, drug_formula, administration_method, drug_price, expiry_date
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try{
                
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_drug_dispense";

            // Create database connection
            $conn = new mysqli($servername,
                $username, $password, $dbname);

            // Check and confirm the connection
            if ($conn->connect_error) {
                die("Connection failed: "
                    . $conn->connect_error)."<br>";
            } else{
                echo "Connected to ".$dbname." successfully<br>";
            }


            // Preparing a statement to insert the data:
            $sql = "INSERT INTO tbl_drugs (trade_name, drug_formula, administration_method, drug_price, expiry_date)
            VALUES (?, ?, ?, ?, ?)"; // The sql parametized statement
            $statement = $conn->prepare($sql); // prepare the sql statement

            // Bind values to parameters:
            $statement->bind_param("sssds", $trade_name, $drug_formula, $administration_method, $drug_price, $expiry_date);

            // Obtain values from the input fields of the form using $_POST[]:
            //$drugs_ssn = $_POST['drugs_ssn'];
            $trade_name = $_POST['trade_name'];
            $drug_formula = $_POST['drug_formula'];
            $administration_method = $_POST['administration_method'];
            $drug_price = $_POST['drug_price'];
            $expiry_date = $_POST['expiry_date'];

            // Run the statement:
            if($statement->execute()=== TRUE){
                echo "<h2>Data entered into table successfully!<h2>";

                // Insert HTML line breaks before all newlines in a string
                //echo nl2br("\n$drugs_ssn\n $trade_name\n $drug_formula\n $drug_price\n$expiry_date\n $drugs_phone");
            } else{
                // Print an error message if data is not inserted
                echo "Error in inserting the data: ".$conn->error;
            }
            }
            catch (Exception){
                echo "<h3>An error occurred while processing request. Check if your input is valid.</h3>";
            }
            
        }


        ?>
    </center>
    <form action="/view_drugs.php" method="GET">
        <input type="submit" value="View Patients Table">
    </form>
    <form id="drugs-form" action="process/process_drugs.php" method="POST">
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
        <input type="submit" value="Submit"><br>
    </form>  
</body>
</html>