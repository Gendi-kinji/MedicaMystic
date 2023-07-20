import os
from time import sleep

def create_file(filenames):
    for i in range(len(filenames)):
        filename = f"manage_{filenames[i]}.php"
        # Check if file already exists
        if not os.path.exists(filename):
            # Create a file
            text_file = open(filename, "x")
            text_file.close()
            
            # Open the file in write mode
            text_file = open(filename, "w")
            
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
                TableView::showEditableTable(${filenames[i]}_table,'{filenames[i]}');
            ?>
        </body>
</html>
''')
            text_file.close()
            
            print(f'php file {filenames[i]} created.')
            
            # Delay execution for 1.5 seconds
            sleep(1.5)
            
        else:
            print(f'{filename} exists.')
            
            
filenames = [
    'doctors',
    'pharmacy',
    'pharmaceutical',
    'supervisors',
    'invoices',
    'invoiceitems',
    'patients',
    'drugs',
    'prescriptions',
    'users'
]

create_file(filenames)
