<?php

// Playback streams API URL
$playback_streams_url = "https://us.api.iheart.com/api/v2/playback/streams";

$playback_headers = array(
    "Accept: application/json, text/plain, */*",
    "Accept-Encoding: gzip, deflate, br",
    "Accept-Language: en",
    "Connection: keep-alive",
    "Content-Type: application/json",
    "Host: us.api.iheart.com",
    "Origin: https://www.iheart.com",
    "Referer: https://www.iheart.com/",
    "Sec-Fetch-Dest: empty",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Site: same-site",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
    "X-Ihr-Profile-Id: 454682184",
    "X-Ihr-Session-Id: DguxuVNww136kZ5PKFLFvo",
    "X-Locale: en-US",
    "X-Session-Id: DguxuVNww136kZ5PKFLFvo",
    "X-User-Id: 454682184",
    "X-hostName: webapp.US",
    "sec-ch-ua: \"Google Chrome\";v=\"119\", \"Chromium\";v=\"119\", \"Not?A_Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
);

$response = array();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $episode_id = $_GET['id'];

    // Payload for playback streams API request
    $playback_payload = array(
        "contentIds" => array($episode_id),
        "hostName" => "webapp.US",
        "playedFrom" => 6,
        "stationId" => 27955498,
        "stationType" => "PODCAST"
    );

    $ch = curl_init($playback_streams_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($playback_payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $playback_headers);
    
    $playback_response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Check if the request was successful
    if ($http_code == 200) {
        $response['success'] = true;
        $responseData = json_decode($playback_response, true);

        if (isset($responseData['data']['items'][0]['content']['startDate'])) {
            $timestamp = $responseData['data']['items'][0]['content']['startDate'] / 1000; 
            $responseData['data']['items'][0]['content']['startDate'] = date('Y-m-d H:i:s', $timestamp);
        }

        if (isset($responseData['data']['items'][0]['content']['duration'])) {
            $durationInSeconds = $responseData['data']['items'][0]['content']['duration'];
            $responseData['data']['items'][0]['content']['duration'] = gmdate("H:i:s", $durationInSeconds);
        }

        $response['data'] = $responseData;
    } else {
        $response['success'] = false;
        $response['error'] = "Error accessing playback streams API";
    }
} else {
    $response['success'] = false;
    $response['error'] = "No episode ID provided.";
}

// Set response header to JSON
header('Content-Type: application/json');

echo json_encode($response, JSON_PRETTY_PRINT);
?>
