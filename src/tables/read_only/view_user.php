
<?php
require_once "../../inc/autoloader.inc.php";       
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Users Table</h1>
            <?php
                $user= new user();
                $user_table = $user->getAllusers();
                TableView::showReadOnlyTable($user_table);
            ?>
        </body>
</html>
