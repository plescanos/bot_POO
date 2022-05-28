<?php

//DATOS PARA LA CONEXIÓN CON TELEGRAM Y RECONOCIMIENTO DEL MENSAJE

$token= "bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4";

$data = file_get_contents("php://input");
$update = json_decode($data,true);
$message = $update['message'];

$id = $message["from"]["id"];
$name = $message["from"]["first_name"];
$text = $message["text"];

$photo = "https://bot-poo.000webhostapp.com/E1.1.png";

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
    $respuesta = "<b>Ejercicio número 1:</b> \n\n Primero vamos a hablar sobre un objeto del mundo real: un celular 📱.\n\n De las siguientes opciones ¿Cuál <b>NO</b> corresponde a un atributo de la clase celular? (recuerda que los atributos son características o propiedades de los objetos)";

    $keyboard= [
        ['Memoria','Conectarse a internet'],
        ['Tamaño (pulgadas)','Espacio (GB)']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
} 

//PRIMERA RESPUESTA
else if (isset($text) && $text == 'Conectarse a internet'){
    $respuesta = "Exacto!🤩 Ahora selecciona cuál es un método de la clase celular. (Recuerda que los métodos son las operaciones, funciones o acciones que puede hacer una clase)";
    $keyboard= [
        ['Color','Encender'],
        ['Marca','Espacio']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);

}
//SEGUNDA RESPUESTA
else if(isset($text) && $text == 'Encender'){
    $respuesta = "Correcto!🤩 Para el estudio de POO te recomendamos realizar diagramas UML de las clases que vas creando.\n\n Ahora selecciona cuál de los diagramas correspondería a la clase Celular \n\n Recuerda que el orden de un diagrama UML para las calses es 1. Nombre de la clase 2. Atributos 3. Métodos.";

    $keyboard= [
        ['Diagrama 1','Diagrama 2'],
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendPhoto($id,$photo,$token);
    sendMessage($id,$respuesta,$token,$k);

}

//TERCERA RESPUESTA
else if (isset($text) && $text == 'Diagrama 1'){
    $respuesta = "✅ Vas súper bien ".$name." 🥳. Ahora es momento de abrir tu editor de código (netbeans, eclipse, o cualquiera que te guste) y responde: \n Cómo declararías la clase celular en Java:
    \n\n <b>Opciones</b>
    \n Celular{ … }
    \n public class Celular( ){ … }
    \n Void Celular ( ) { … }
    ";

    $keyboard= [
        ['Celular{ … }','Void Celular ( ) { … }'],
        ['public class Celular( ){ … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//CUARTA RESPUESTA
else if (isset($text) && $text == 'public class Celular( ){ … }'){
    $respuesta = "Excelente! ✅ Recuerda, en Java las clases se declaran con la palabra reservada Class. \n\n Considerando que la clase “Celular” tiene los atributos color y memoria. ¿Cuál sería el constructor de la clase? \n\nOpciones
    \npublic Celular (String color, int memoria) { … }
    \nprivate Constructor (String color, int memoria) { … }
    \nCelular () { … }
    ";
    $keyboard= [
        ['public Celular (String color, int memoria) { … }','private Constructor (String color, int memoria) { … }'],
        ['Celular () { … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);

}

//QUINTA RESPUESTA
else if (isset($text) && $text == 'public Celular (String color, int memoria) { … }'){
    $respuesta = "✅ Muy bien! Recuerda que el constructor 👷 permite darle un valor inicial a una instancia de clase. En Java el constructor debe recibir el mismo nombre de la clase.
    \n\n Ya que sabes declarar una clase y darle un estado inicial, ahora vas a recordar el siguiente pilar de POO 🏛️Encapsulamiento🏛️
    \n En la declaración de los atributos siguientes, ¿cuál utiliza encapsulamiento?
    \nString color = “rojo”;
    \nprivate String color; 
    ";
    $keyboard= [
        ['String color = “rojo”'],
        ['private String color']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SEXTA RESPUESTA
else if (isset($text) && $text == 'private String color'){
    $respuesta = "✅ Estás en lo correcto 😄 En java, para proteger los atributos o clases de un objeto se utilizan las palabras reservadas (modificadores de acceso) private, public, protected. 
    \n\n Pero... y si quieres acceder o modificar algún atributo encapsulado es necesario utilizar métodos getters y setters. Cuál sería el método setter correcto para el atributo color.
    \n\nOpciones
    \npublic void setColor(String color) { … }
    \npublic String setColor() { … }
    ";
    $keyboard= [
        ['public void setColor(String color) { … }'],
        ['public String setColor() { … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SEXTA RESPUESTA
else if (isset($text) && $text == 'public void setColor(String color) { … }'){
    $respuesta = "✅ Perfecto 😀. Los métodos setters deben ser void porque no retornan un valor.
    \nEntonces ¿Cuál sería el método getter correcto para el atributo memoria?";
    $keyboard= [
        ['public void getMemoria(Int memoria) { … }'],
        ['public int getMemoria( ) { … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SÉPTIMA RESPUESTA
else if (isset($text) && $text == 'public int getMemoria( ) { … }'){
    $respuesta = "Súper! 🥳🥳🥳 has resuelto el primer estudio de caso. Ahora puedes programarlo en Java y comparar con nuestra solución en el siguiente enlace: \n*Enlace de GitHub con la resolución*
    \n\nYa puedes identificar una clase, y utilizar encapsulamiento en sus atributos y clases. Puedes continuar con el siguiente estudio de caso (cuando esté desarrollado claro 😅";
    $keyboard= [
        ['public void getMemoria(Int memoria) { … }'],
        ['public int getMemoria( ) { … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

else if(isset($text)){
    $respuesta = "No, intenta de nuevo 🤕";

    sendMessage($id,$respuesta,$token);
} 



//ENVÍO Y CONEXIÓN API DE TELEGRAM

//Función para enviar menssajes
function sendMessage($chatID, $messaggio, $token,&$k = ''){
    $url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;

	if(isset($k)) {
		$url = $url."&reply_markup=".$k; 
		}


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

//Función para enviar fotos
function sendPhoto($chatID, $photo, $token){
    $url = "https://api.telegram.org/" . $token . "/sendPhoto?photo=".$photo."&chat_id=" . $chatID;

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
/*
function sendGame($chatID, $gameName, $token){
    $url = "https://api.telegram.org/" . $token . "/sendGame?game_short_name=".$gameName."&chat_id=" . $chatID;

    $url = $url."&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}*/

/* Aquí puede mandar stickers al menos desde la web
function sendSticker($chatID, $sticker, $token){
    $url = "https://api.telegram.org/" . $token . "/sendSticker?file_id=".$sticker."&chat_id=" . $chatID;

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
*/

?>


