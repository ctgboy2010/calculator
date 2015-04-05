<?php
    session_start();

    if($_SERVER['REQUEST_METHOD']=="GET"){
        header('location: calculator.php');
    }

    if (empty($_POST['number1']) && empty($_POST['number2'])) {
        $_SESSION['msg']="Number1 and Number2 is required";
        header('location: calculator.php');
    }
    else {
        if ($_POST['calc'] == 'add') {
            $_SESSION['result']=add($_POST['number1'], $_POST['number2']);
            //header('location: calculator.php');
        } elseif ($_POST['calc'] == 'subtract') {
            $_SESSION['result']=subtract($_POST['number1'], $_POST['number2']);
            //header('location: calculator.php');
        } elseif ($_POST['calc'] == 'divide') {
            $_SESSION['result']=divide($_POST['number1'], $_POST['number2']);
            //header('location: calculator.php');
        } elseif ($_POST['calc'] == 'multiply') {
            $_SESSION['result']=multiply($_POST['number1'], $_POST['number2']);
            //header('location: calculator.php');
        }
        else{
            $_SESSION['msg']="Please select one of them <strong>Add or Subtract or Divide or Multiply</strong>!!!";
            //header('location: calculator.php');
        }
        header('location: calculator.php');
    }

    function add($num1, $num2)
    {
        $result=$num1 + $num2;
        return $result;
    }

    function subtract($num1, $num2)
    {
        if ($num1 >= $num2) {
            $result=$num1 - $num2;
            return $result;
        } else {
            $_SESSION['msg'] = "Number1 should be larger than Number2";
            header('location: calculator.php');
        }
    }

    function divide($num1, $num2)
    {
        if ($num2==0 ) {
            $_SESSION['msg'] = "Can not Divide";
            header('location: calculator.php');
        } else {
            $result=$num1 / $num2;
            return $result;
        }
    }

    function multiply($num1, $num2)
    {
        $result=$num1 * $num2;
        return $result;
    }
