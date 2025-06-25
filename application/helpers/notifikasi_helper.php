<?php
function kirimNotifikasiTelegram($pesan) {
    $token = "7950642825:AAHZMUACwWkKr-0L4k3sJEJheqhqJzISmZQ";
    $chat_id = "6886100368";
    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($pesan);

    file_get_contents($url);
}

function kirimNotifikasiWhatsApp($pesan) {
    $instanceId = "instance110465"; 
    $token = "qpueirwz2hwnntsx"; 
    $phone = "62895800403311"; 

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