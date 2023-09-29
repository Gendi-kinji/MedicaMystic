<?php
require_once 'drug_display.php';
?>
<?php
$pageTitle = "Drug Dashboard"; // Default title
if (isset($_GET["category"])) {
    $category = $_GET["category"];
    if ($category == "painkillers") {
        $pageTitle = "Painkillers";
    }
    if ($category == "antibiotics") {
        $pageTitle = "Antibiotics";
    }
    if ($category == "vaccines") {
        $pageTitle = "Vaccines";
    }
    if ($category == "antidepressant") {
        $pageTitle = "Antidepressants";
    }
    if ($category == "antifungals") {
        $pageTitle = "Antifungals";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/drug_dashboard.css" />
    <title>
        <?php echo $pageTitle ?>
    </title>
</head>

<body>
    <?php
    include 'common_sections/topbar.php';
    ?>
    <div class="maincontainer">
        <div class="wrapper">
            <nav class="nav-bar">
                <h4>Select a category</h4>
                <hr>
                <ul>
                    <li><a href="drug_dashboard.php?category=painkillers">Painkillers</a></li>
                    <li><a href="drug_dashboard.php?category=antibiotics">Antibiotics</a></li>
                    <li><a href="drug_dashboard.php?category=vaccines">Vaccines</a></li>
                    <li><a href="drug_dashboard.php?category=antidepressant">Antidepressants</a></li>
                    <li><a href="drug_dashboard.php?category=antifungals">Antifungals</a></li>
                </ul>
            </nav>
            <div class="main-content">
                <?php
                if (isset($_GET["category"])) {
                    $category = $_GET["category"];
                    $drug = new Drug();
                    $data = $drug->getDrugsByCategory($category);

                    foreach ($data as $row) {
                        echo "<div class='drug-hero'>";
                        echo "<div class='drug-details'>";
                        foreach ($row as $key => $value) {
                            if ($key === "drug_id") {
                                echo generateImage($value);
                                echo "<a href=drug_details.php?id=" . $value . ">" . "View details" . "</a>";
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                }

                ?>

            </div>
        </div>
    </div>
    <?php include 'common_sections/footer.php'; ?>
</body>

</html>