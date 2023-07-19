from time import sleep

def create_file(filenames):
    for i in range(len(filenames)):
            
            # Create a file
            text_file = open(f"view_{filenames[i]}.php", "x")
            text_file.close()
            # Open the file in write mode
            text_file = open(f"view_{filenames[i]}.php", "w")
            
            # Write content to the file:
            text_file.write(f'''
<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/{filenames[i]}.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{filenames[i]} Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>{filenames[i]} Table</h1>
            <?php
                ${filenames[i]}= new {filenames[i]}();
                ${filenames[i]}_table = ${filenames[i]}->getAll{filenames[i]}();
                TableView::showReadOnlyTable(${filenames[i]}_table,'{filenames[i]}');
            ?>
        </body>
</html>
''')
            text_file.close()
            
            print(f'php file {filenames[i]} created.')
            
            # Delay execution for 1.5 seconds
            sleep(1.5)
            

# MAIN
# List of filenames
filenames = [
    'drug', 
    'doctor', 
    'pharmacy', 
    'pharmaceutical', 
    'patient', 
    'prescription',
    'invoice',
    'invoice_item',
    'user',
    'prescription_item',
    'supervisor'
    ]

# run the script
create_file(filenames)
            