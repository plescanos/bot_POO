<?php

//DATOS PARA LA CONEXIÓN CON TELEGRAM Y RECONOCIMIENTO DEL MENSAJE

$token= "bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4";

$data = file_get_contents("php://input");
$update = json_decode($data,true);
$message = $update['message'];

$id = $message["from"]["id"];
$name = $message["from"]["first_name"];
$text = $message["text"];

//ASIGNACIÓN COMANDO EN FORMATO /----

if(isset($text) && $text == '/start' ){
    $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programación 😄\n\n Para iniciar tu practica por favor utiliza el comando /ejercicio";

    sendMessage($id,$respuesta,$token);
} 
else if (isset($text) && $text == '/help' ){
    $respuesta = "Este bot se encarga de generar ejercicios y guiarte en el proceso de abstracción, de acuerdo a los pilares de la programación orientada a objetos (POO) 😁.\n\nSabemos que puede ser un camino difícil, por lo que vas a iniciar con ejercicios sencillos, y asociarlos a su solución en diagrama UML. Una vez realizado el proceso de abstracción, recomendamos que desarrolles estos ejercicios en el lenguaje de programación Java.";

    sendMessage($id,$respuesta,$token);
} 

//EJERCICIOS

else if (isset($text) && $text == '/ejercicio' ){
    $respuesta = "<b>Ejercicio número 1:</b> \n\n Primero vamos a hablar sobre un objeto del mundo real: un celular 📱.\n\n De las siguientes opciones ¿cuáles serían sus atributos? (recuerda que los atributos son características o propiedades de los objetos)";

    sendMessage($id,$respuesta,$token);
} 

//SI EL USUARIO ENVÍA TEXTO DIFERENTE A UN COMANDO
else if (isset($text)){
    $respuesta = "Por favor envíame un comando 🤕";
    sendMessage($id,$respuesta,$token);
}



//ENVÍO Y CONEXIÓN API DE TELEGRAM

function sendMessage($chatID, $messaggio, $token,&$k = ''){
    $url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;
/*
	if(isset($k)) {
		$url = $url."&reply_markup=".$k; 
		}
*/

    $url = $url."&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
?>