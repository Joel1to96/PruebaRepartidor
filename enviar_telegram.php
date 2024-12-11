<?php
// Reemplaza estos valores con los tuyos
$token = "8092840481:AAFKYcrqbdkN-9m3xOiCOkRNmdahCeshD4E"; // El token del bot de Telegram
$chat_id = "-1002322856211"; // El chat_id del grupo donde se enviará el mensaje

// Obtener la dirección del formulario
$direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';

if (!empty($direccion)) {
    // Preparamos el mensaje
    $texto = "Nueva dirección recibida:\n" . $direccion;

    // URL de la API de Telegram para enviar mensajes
    $url = "https://api.telegram.org/bot$token/sendMessage";
    
    // Datos a enviar
    $data = [
        'chat_id' => $chat_id,
        'text' => $texto
    ];

    // Usamos cURL para enviar la petición a Telegram
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Opcionalmente, puedes verificar si $response indica éxito.
    // Redirigimos a una página de confirmación o simplemente mostramos un mensaje
    echo "<p>La dirección se ha enviado correctamente a los repartidores.</p>";
} else {
    echo "<p>No se proporcionó ninguna dirección.</p>";
}
?>
