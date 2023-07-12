<?php
class TableView{
    public static function showEditableTable($table_data, $item_name, $itemsPerPage = 10) {
        // Get the current page number from the URL, default to 1 if not set
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        // Calculate the start and end index of the data to display on the current page
        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $endIndex = min($startIndex + $itemsPerPage, count($table_data));

        if (count($table_data) > 0) {
            echo "<table>";
            $keys = array_keys($table_data[0]); // get the columns of the table from the first array
            $id = $keys[0];
            echo "<tr>";
            foreach ($keys as $key) {
                echo "<th scope='col'>" . $key . "</th>"; // display the attributes as headers for the table
            }
            echo "<th colspan=2>Action</th>";
            echo "</tr>";
            for ($i = $startIndex; $i < $endIndex; $i++) {
                $row = $table_data[$i];
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>"; // display the records (values) in the HTML table
                }
                $identifier = $row[$id];
                echo "<td><a class='btn-links btn-update' href='../update/update_$item_name.php?id=$identifier'>Update</a></td>";
                echo "<td><a class='btn-links btn-delete' href='../delete/$item_name.delete.php?id=$identifier'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";

            // Display the pagination! (they are just hyperlinks for now)
            $pageNumbers = PageView::Pagination(count($table_data), $itemsPerPage, $currentPage);
            echo '<div class="pagination">';
            foreach ($pageNumbers as $pageNumber) {
                echo '<a href="?page=' . $pageNumber . '">' . $pageNumber . '</a> ';
            }
            echo '</div>';
        }
        echo "<br>";
        echo "<a class='btn-links btn-new' href='../add/add_$item_name.php'>Add New Record</a>";
    }

    public static function showReadOnlyTable($table_data, $item_name, $itemsPerPage = 10){
        // Get the current page number from the URL, default to 1 if not set
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        // Calculate the start and end index of the data to display on the current page
        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $endIndex = min($startIndex + $itemsPerPage, count($table_data));

        if (count($table_data) > 0) {
            echo "<table>";
            $keys = array_keys($table_data[0]); // get the columns of the table from the first array
            echo "<tr>";
            foreach ($keys as $key) {
                echo "<th scope='col'>" . $key . "</th>"; // display the attributes as headers for the table
            }
            echo "</tr>";
            for ($i = $startIndex; $i < $endIndex; $i++) {
                $row = $table_data[$i];
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>"; // display the records (values) in the HTML table
                }
                echo "</tr>";
            }
            echo "</table>";

            echo "<br>";
            // Display the pagination! (they are just hyperlinks for now)
            $pageNumbers = PageView::Pagination(count($table_data), $itemsPerPage, $currentPage);
            echo '<div class="pagination">';
            foreach ($pageNumbers as $pageNumber) {
                echo '<a href="?page=' . $pageNumber . '">' . $pageNumber . '</a> ';
            }
            echo '</div>';
        }
    }
}
?>