<?php
namespace App\Helpers;

class FileUpload {
    public function uploadImage($file, $directory) {
        // Create upload directory 
        $uploadDir = 'uploads/' . $directory . '/';
        error_log("Tentative d'upload dans le dossier: $uploadDir");
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Check if the file is an actual image
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            return [
                'success' => false,
                'error' => 'Le fichier n\'est pas une image'
            ];
        }
        
        // Allow only certain file formats
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (!in_array($fileExtension, $allowedExtensions)) {
            return [
                'success' => false,
                'error' => 'Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés'
            ];
        }
        
        // Generate a unique filename
        $newFilename = uniqid() . '.' . $fileExtension;
        $targetFile = $uploadDir . $newFilename;
        
        // Try to upload the file
       // Dans la méthode uploadImage
if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    return [
        'success' => true,
        'file_path' => $targetFile
    ];
} else {
    $uploadError = $_FILES['profile_image']['error'];
    $errorMessage = "Une erreur est survenue lors du téléchargement du fichier (code: $uploadError)";
    
    switch($uploadError) {
        case UPLOAD_ERR_INI_SIZE:
            $errorMessage = "Le fichier dépasse la taille maximale définie dans php.ini";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $errorMessage = "Le fichier dépasse la taille maximale spécifiée dans le formulaire HTML";
            break;
        case UPLOAD_ERR_PARTIAL:
            $errorMessage = "Le fichier n'a été que partiellement téléchargé";
            break;
        case UPLOAD_ERR_NO_FILE:
            $errorMessage = "Aucun fichier n'a été téléchargé";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $errorMessage = "Dossier temporaire manquant";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $errorMessage = "Échec d'écriture du fichier sur le disque";
            break;
    }
    
    return [
        'success' => false,
        'error' => $errorMessage
    ];
}
    }
}
