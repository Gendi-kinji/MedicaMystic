<?php

spl_autoload_register(function ($class_name) {
    $class_file = $class_name . '.class.php';
    $interface_file = $class_name.'.interface.php';

    // An array that specifies the order in which the files should be loaded from the classes folder
    $load_order = [
        'connection.class.php',
        'databasehandler.class.php',
        'formprocessorinterface.interface.php',
        'formprocessor.class.php',
        'webapputils.class.php',
    ];

    foreach ($load_order as $file) {
        $file_path = __DIR__ . '/classes/' . $file;

        if (file_exists($file_path)) {
            require_once $file_path;
            // Log the loaded class and file path (for debugging)):
            //echo "Loaded class: $class_name from $file_path<br>";
        } else{
            //echo "File not found: $file_path<br>";
        }
    }

    // Load class files based on their location
    $class_locations = [
        'controllers/',
        'models/',
        'views/',
        'interfaces/',
        'form_processors/'
    ];

    foreach ($class_locations as $location) {
        if($location === 'interfaces/'){
            $file_path = __DIR__.'/classes/' . $location . $interface_file;
        }else{
            $file_path = __DIR__ . '/classes/' . $location . $class_file;
        }
        if (file_exists($file_path)) {
            require_once $file_path;
            // Log the loaded class and file path (for debugging)):
            // echo "Loaded class: $class_name from $file_path<br>";
            break;
        } else{
            //echo "File not found: $file_path<br>";
        }
    }
});
