<?php
session_start();

processCalculation();
function processCalculation(){
    $_SESSION['result'] = getCalculationResult($_POST['calc'],
            $_POST['number1'], $_POST['number2']);
    header('location:calculator.php');
}

function getCalculationResult($operation, $number1, $number2){
    $result = '';
    if( $operation == 'add'){
        $result = add($number1, $number2);
    }elseif($operation == 'subtract'){
        $result = subtract($number1, $number2);
    }elseif($operation == 'multiply'){
        $result = multiply($number1, $number2);
    }elseif($operation == 'divide'){
        $result = divide($number1, $number2);
    }
    return $result;
}

function subtract($number1, $number2){
    $result = null;
   if($number1 > $number2){
       $result = $number1 - $number2;
       return $result;
   } else{
        return "Please provide larger number for number1";
   }

}
function divide($number1, $number2){
    $result = null;
    if($number2 == 0){
       return "Please provide any number which is greater than 0 for number2.";
    }
    $result = $number1 / $number2;
    return $result;
}

function add($number1, $number2){
    $result = null;
    $result = $number1 + $number2;
    return $result;
}

function multiply($number1, $number2){
    $result = null;
    $result = $number1 * $number2;
    return $result;
}