
<?php
class ImageUploader  {
    private $targetDirectory;
    private $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    public function __construct($targetDirectory) {
        $this->targetDirectory = $targetDirectory;
    }

    public function uploadImage($fieldName) {
        $targetFile = $this->targetDirectory . basename($_FILES[$fieldName]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (!is_uploaded_file($_FILES[$fieldName]["tmp_name"])) {
            return "Error: File is not an image.";
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            return "Error: File already exists.";
        }

        // Check file size
        if ($_FILES[$fieldName]["size"] > 500000) {
            return "Error: File is too large.";
        }

        // Allow certain file formats
        if (!in_array($imageFileType, $this->allowedExtensions)) {
            return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        // Upload file
        if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFile)) {
            return "File has been uploaded successfully.";
        } else {
            return "Error: There was an error uploading your file.";
        }
    }
}

?>