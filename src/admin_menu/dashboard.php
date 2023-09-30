<?php
// Include important files:
    require_once "../inc/autoloader.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../styles/dashboard.css">
</head>
<body style="text-align:center;">
    <?php
      include '../common_sections/topbar.php';
    ?>
    <?php
        // Resume the session started by the processing page and reclaim the admin_name:
        session_start();
        if(isset($_SESSION['admin_name'])){
            $admin_name = $_SESSION['admin_name'];
        }else{
            $admin_name = 'user';
        }
    ?>
    <header class="page-header">
         <!--Displaying the username on the page-->
        <span style="margin-left:50%; align=right;" id="welcome-username">Welcome, <?php echo $admin_name; ?></span>
        <h1>Admin Page</h1>
    </header>
    <div class="dashboard">
        <header class="dashboard-header">
            <h1>Dashboard</h1>
            <hr>
        </header>
        <div class="dashboard-content">
            <div class="insert-forms-nav">
                <h3>Insert Forms</h3>
                <?php WebAppUtils::generateFilesList("add", "add_");?>
            </div>
            <div class="tables-nav">
                <h3>Manage DB Tables</h3>
                <?php WebAppUtils::generateFilesList("/tables/editable", "manage_")?>
            </div>
            <div class="dashboard-nav">
                <h3>Dashboards</h3>
                <a class='files-link' href='../drug_dashboard.php' target='_blank'>Drug Dashboard</a>
        </div>
    </div><br>
    <?php
      include '../common_sections/footer.php';
    ?>
</body>
</html>