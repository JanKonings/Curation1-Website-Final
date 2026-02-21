<?php
    $listId = 3;
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $smsOptIn = isset($_POST['smsOptIn']) && $_POST['smsOptIn'] == '1';

    
    // Validate
    if (!$email) {
        http_response_code(400);
        echo "Missing email";
        exit;
    }

    $attributes = [];

    if ($smsOptIn && $phone) {
        // Only attach phone if they consented to SMS marketing
        $attributes['SMS'] = $phone;
        $attributes['SMS_MARKETING'] = true;   // custom attribute in Brevo
    } else {
        $attributes['SMS_MARKETING'] = false;
    }
    
    // Build data
    $data = [
        'email'         => $email,
        'attributes'    => $attributes,
        'listIds'       => [$listId],
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