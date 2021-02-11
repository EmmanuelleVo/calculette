<?php

function getResultMessage($number1, $number2, $operation):string {
    // retourner une phrase avec un calcul en fonction de l'opération avec match
    return match($operation) {
    'add' => "Additionner ${number1} à ${number2} vaut " . ($number1 + $number2),
    'subtract' => "Soustraire ${number2} de ${number1} vaut " . ($number2 - $number1),
    'multiply' => "Multiplier ${number1} par ${number2} vaut " . ($number1 * $number2),
    'divide' => "Diviser ${number1} par ${number2} vaut " . ($number1 / $number2),
    'power' => "${number1} exposant ${number2} vaut " . ($number1 ** $number2),
    'modulo' => "Le reste de la division de ${number1} par ${number2} vaut " . (fmod($number1, $number2))
    };


}


// fmod permet de faire des modulos sur les valeurs décimales