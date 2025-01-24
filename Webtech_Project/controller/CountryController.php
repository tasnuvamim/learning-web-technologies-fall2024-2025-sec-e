<?php
// guidance_controller.php

// Handle POST request to fetch country-based guidance
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data || empty($data['country'])) {
        echo json_encode(['status' => 'error', 'message' => 'Please select a country.']);
        exit;
    }

    $country = $data['country'];
    $filePath = "{$country}.pdf";

    // Check if the file exists (you might want to implement file validation here)
    if (file_exists($filePath)) {
        echo json_encode(['status' => 'success', 'message' => "Guidance document for {$country} is ready.", 'file' => $filePath]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Guidance document not available.']);
    }
    exit;
}

// Include the view for displaying the form
include('view/country_guidance.php');
?>
