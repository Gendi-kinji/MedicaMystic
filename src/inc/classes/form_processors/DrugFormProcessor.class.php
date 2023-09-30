<?php
class DrugFormProcessor extends FormProcessor
{

    public function checkAllFields($formData)
    {
        $this->validateRequiredFields($formData);
        $this->validatePositiveNumber($formData['drug_price']);
        $this->validatePositiveNumber($formData['drug_quantity']);
        $this->validatePositiveNumber($formData['dosage_mg']);

        if (!empty($_FILES['drug_image'])) {
            // Call the validateImage method from the parent class
            $this->imageData = $this->validateImage();
            $imageValidationErrors = $this->imageData['errors'];

            if (!empty($imageValidationErrors)) {
                // Merge image validation errors with other errors
                $this->errors = array_merge($this->errors, $imageValidationErrors);
            }
        }
    }

    public function insertData($data)
    {
        // Insert the data into the database
        $drug = new Drug();
        $drug_id = $drug->addDrug($data);

        // Setting the image data
        $imageData = [
            'drug_id' => $drug_id,
            'image' => $this->imageData['image_path'],
        ];

        // Add the image of the drug to the database

        $drug->addDrugImage($imageData);

        return true;
    }
    public function updateData($data, $id)
    {
        // Update the data in the database
        $drug = new Drug();
        $drug->updateDrug($data, $id);

        // Check if files global variable is empty
        if(!empty($this->imageData)){
            // Setting the image data
        $imageData = [
            'drug_id' => $id,
            'image' => $this->imageData['image_path'],
        ];

        // Add the image of the drug to the database
        $drug->updateDrugImage($imageData, $id);
        }
        
        return true;
    }
}

?>