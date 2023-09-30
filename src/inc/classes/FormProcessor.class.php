<?php
abstract class FormProcessor implements FormProcessorInterface
{
    protected $errors = array();
    protected $imageData = array();

    // Abstract methods:
    public abstract function checkAllFields($formData); // Check all fields for errors
    public abstract function insertData($data); // Insert data into the database
    public abstract function updateData($data, $id); // Update data in the database
    public function processForm($formData, $id = 0, $action = 'add')
    {
        session_start();

        $this->checkAllFields($formData);

        if (empty($this->errors)) {
            switch($action){
                case 'add':
                    $success = $this->insertData($formData);
                    break;
                case 'update':
                    $success = $this->updateData($formData, $id);
                    break;
            }

            if ($success) {
                return true;
            }
        } else {
            $_SESSION['errors'] = $this->errors;
            return false;
        }

    }

    // Validators:
    public function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function validatePhoneNo($phone)
    {
        return preg_match("/^\+\d{1,3}\d{3,14}$/", $phone);
    }
    public function validatePositiveNumber($value)
    {
        return $value >= 0;
    }
    public function validateRequiredFields($formData)
    {
        foreach ($formData as $field => $value) {
            if (empty($value)) {
                $this->errors[] = "All fields are required." . $field . $value;
                break; // No need to check further if one field is empty
            }
        }
    }

    // Validate the image uploaded - returns image path, or null if image upload failed:
    public function validateImage()
    {
        $uploadFile = null;
        $errors = []; // Holds error messages

        if (isset($_FILES["drug_image"]) && $_FILES["drug_image"]["error"] == 0) {
            $image = $_FILES["drug_image"]; // Get the uploaded image
            // Validate the uploaded image
            $allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Allowed file extensions
            $maxFileSize = 5 * 1024 * 1024; // 5MB max file size

            $uploadDir = __DIR__ . "/../../uploads/"; // Image upload directory - uploads are saved here

            // Check if upload directory exists, if not create it
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $uploadFile = $uploadDir . basename($image["name"]); // Get the file name
            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION)); // Get the file extension

            // Check if the file already exists in the upload directory
            if (file_exists($uploadFile)) {
                $errors[] = "A file with the same name already exists. Please choose a different name."; // Same file name
            } elseif (!in_array($imageFileType, $allowedExtensions)) {
                $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed."; // Check file extension
            } elseif ($image["size"] > $maxFileSize) {
                $errors[] = "The uploaded image is too large. Maximum file size is 5MB."; // Check file size
            } elseif (!move_uploaded_file($image["tmp_name"], $uploadFile)) {
                // File couldn't be moved
                $errors[] = "Error uploading the image.";
            }
        } else {
            $errors[] = "No image uploaded"; // Unknown error / file input not set
        }

        return [
            'image_path' => $uploadFile,
            'errors' => $errors,
        ]; // An array with the image path and  generated errors
    }
}