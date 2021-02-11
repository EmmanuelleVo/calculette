<?php

function validated():array
{
    // lister dans un tableau les opérations
    $operations = [
        'add' => '+',
        'subtract' => '-',
        'multiply' => '*',
        'divide' => '/',
        'power' => '^',
        'modulo' => '%'
    ];
    // si l'opération demandé par l'user n'est pas une des clés du tableau $operations
    if (!array_key_exists($_GET['operation'], $operations)) {
        return ['error' => 'L’opération demandée n’est pas encore prévue par notre système'];
    }
    if (!is_numeric($_GET['number1']) && !is_numeric($_GET['number2'])) {
        return ['error' => 'Aucun des nombres fournis n’est valide'];
    }
    if (!is_numeric($_GET['number1'])) {
        return ['error' => 'Le premier nombre fourni n’est pas valide'];
    }
    if (!is_numeric($_GET['number2'])) {
        return ['error' => 'Le deuxième nombre fourni n’est pas valide'];
    }

    if((float)$_GET['number2'] === 0.0 && ($_GET['operation'] === 'divide' || $_GET['operation'] === 'modulo')) {
        return ['error' => 'Diviser par 0 est une opération qui ne peut pas être réalisée'];
    }

    $number1 = (float)$_GET['number1'];
    $number2 = (float)$_GET['number2'];
    $operation = $_GET['operation'];

    return compact(
        'number1',
        'number2',
        'operation'
    );


}

/*

[
'number1' => (float)$_GET['number1'],
'number2' => (float)$_GET['number2'],
'operation' => $_GET['operation']
=====
$number1
compact('number1')

 * */