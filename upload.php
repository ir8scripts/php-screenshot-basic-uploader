<?php

    function output ($data = []) {
        echo json_encode($data);
    }

    /**
     * Setters
     */

    /**
     * The directory in which the files will be moved to
     */
    $OUTPUT_DIRECTORY = "images/";

    /**
     * The domain URL to send back in the response
     */
    $DOMAN_URL = 'http://localhost/cdn/';

    /**
     * New file name
     */
    $filename = md5(time());

    /**
     * If no files were received in the request
     */
    if (!count($_FILES)) {
        return output([
            'success' => false,
            'error'   => 'No files were sent to be processed'
        ]);
    }

    /**
     * Get the uploaded file
     */
    $uploadedFile = $_FILES["files"]["name"][0];

    /**
     * Get the extension from the file
     */
    $fileType = pathinfo($uploadedFile, PATHINFO_EXTENSION);

    /**
     * Move the file to the new location with the new name
     */
    if (move_uploaded_file($_FILES["files"]["tmp_name"][0], __DIR__ . '/' . $OUTPUT_DIRECTORY . $filename. '.' .$fileType)) {
        return output([
            'attachments' => [
                [
                    'url' => $DOMAN_URL . $OUTPUT_DIRECTORY . $filename . '.' . $fileType,
                    'proxy_url' => $DOMAN_URL . $OUTPUT_DIRECTORY . $filename . '.' . $fileType
                ]
            ]
        ]);

    /**
     * If an error occurred during the move file process
     */
    } else {
        return output([
            'success' => false,
            'error'   => 'No files were sent to be processed'
        ]);
    }

?>
