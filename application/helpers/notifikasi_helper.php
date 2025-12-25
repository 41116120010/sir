<?php
function kirimNotifikasiTelegram($pesan) {
    $token = "token";
    $chat_id = "id_chat";
    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($pesan);

    file_get_contents($url);
}

function kirimNotifikasiWhatsApp($pesan) {
    $instanceId = "id_instance"; 
    $token = "token"; 
    $phone = "nomor_hp"; 

    $url = "https://api.ultramsg.com/$instanceId/messages/chat";

    $data = [
        'token' => $token,
        'to' => $phone,
        'body' => $pesan
    ];

    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}
?>
