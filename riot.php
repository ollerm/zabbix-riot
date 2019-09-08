?php

// body of message
$data = array(
    'msgtype' => 'm.text',
    'body' => $argv[1]
);
 
$payload = json_encode($data);
 
// Prepare new cURL resource
$ch = curl_init('https://<SERVER_NAME>/_matrix/client/r0/rooms/<ROOM_ID>:<SERVER_NAME>/send/m.room.message?access_token=<TOKEN>');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);
 
// Submit the POST request
$result = curl_exec($ch);
 
// Close cURL session handle
curl_close($ch);
 
?>
