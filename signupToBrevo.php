<?php
    $listId = 3;
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? ''; 
    
    // Validate
    if (!$email || !$phone) {
        http_response_code(400);
        echo "Missing email or phone";
        exit;
    }
    
    // Build data
    $data = [
        'email' => $email,
        'attributes' => ['SMS' => $phone],
        'listIds' => [$listId],
        'updateEnabled' => true,
    ];
    
    // cURL call
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.brevo.com/v3/contacts");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "api-key: $apiKey", 
        "Content-Type: application/json",
        "Accept: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code === 201 || $http_code === 204) {
        echo "Success";
    } else {
        http_response_code($http_code);
        echo "Failed: $response";
    }
?>    