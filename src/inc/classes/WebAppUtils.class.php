<?php
// this class has useful functions that are useful for the program
// they are independent of database operations are they are merely for 'helping out'
class WebAppUtils{
    public static function generateFilesList($folderName, $prefix) {
        $dir = "../" . $folderName . "/";
        if (!is_dir($dir)) {
            echo "Error: Directory '$folderName' does not exist.";
            return;
        }
        $files = scandir($dir);
        echo "<ul class='files-list'>";
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $path = $dir . $file;
                $displayName = substr($file, strlen($prefix), strrpos($file, '.') - strlen($prefix));
                echo "<li class='files-item'><a class='files-link' href='$path' target='_blank'>$displayName</a></li>";
            }
        }
        echo "</ul>";
    }
}
?>