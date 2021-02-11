<?php

/*$number1 = $_GET['number1'] ?? '0';
$number2 = $_GET['number2'] ?? '0';
$result = '';
$error = '';
$sign = '';
if (isset($_GET['number1'], $_GET['number2'])) {
    if (is_numeric($_GET['number1']) && is_numeric($_GET['number2'])) {
        switch ($_GET['operation']) {
            case 'add':
                $result = $number1 + $number2;
                $sign = '+';
                break;
            case 'subtract' :
                $result = $number1 - $number2;
                $sign = '-';
                break;
            case 'multiply' :
                $result = $number1 * $number2;
                $sign = '*';
                break;
            case 'divide' :
                if ($_GET['number2'] === '0') {
                    $error = 'You cannot divide by 0';
                } else {
                    $result = $number1 / $number2;
                    $sign = '/';
                }
                break;
            case 'power' :
                $result = $number1 ** $number2;
                $sign = '^';
                break;
            default :
                $error =  'Use an operator';
        }
    } else {
        $error = 'Enter numbers';
    }
} else {
    $error = 'Not defined';
}*/

require('validation.php');
require('calculation.php');



// 1e étape :  vérifier si number1, number2 et operation sont définis
if (isset($_GET['number1'], $_GET['number2'], $_GET['operation'])) {
    // créer une copie du tableau de $_GET
    $old = $_GET;
    // récupérer les données validées
    $data = validated(); // $data a soit des données valides ou une message d'erreur
    if(!isset($data['error'])) {
        $resultMessage = getResultMessage($data['number1'], $data['number2'], $data['operation']);

    }

}




?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculette</title>
</head>
<body>
<h1>Ma Calculette</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>">
    <label for="number1">Enter a number</label>
    <input type="text" name="number1" id="number1" value="<?= isset($old['number1']) ? $old['number1'] : '0'; ?>">
    <label for="number2">Enter a number</label>
    <input type="text" name="number2" id="number2" value="<?= $old['number2'] ?? 0 ?>">

    <button type="submit" name="operation" value="add">+</button>
    <button type="submit" name="operation" value="subtract">-</button>
    <button type="submit" name="operation" value="multiply">*</button>
    <button type="submit" name="operation" value="divide">/</button>
    <button type="submit" name="operation" value="power" title="">^</button>
    <button type="submit" name="operation" value="modulo">%</button>

</form>
<?php if (isset($data['error'])): ?>
    <p><?= $data['error']; ?></p>
<?php elseif(isset($resultMessage)): ?>
    <p><?= $resultMessage ?></p>
<?php endif; ?>
</body>
</html>