<?php
    $cookie_name1 = "num";
    $cookie_value1 = "";
    $cookie_name2 = "op";
    $cookie_value2 = "";

    if(isset($_POST['num'])) {
        if($_POST['num'] === "c") { 
            $num = "";
        } else {
            $num = $_POST['input'].$_POST['num'];
        }
    } else {
        $num = "";
    }

    if(isset($_POST['op'])) {
        $cookie_value1 = $_POST['input'];
        setcookie($cookie_name1, $cookie_value1, time()+(86400*30), "/");
    
        $cookie_value2 = $_POST['op'];
        if($_POST['op'] === "*") {
            $cookie_value2 = "x";
        }
        setcookie($cookie_name2, $cookie_value2, time()+(86400*30), "/");
        $num = "";
    }
    
    if(isset($_POST['equal'])) {
        $num = $_POST['input'];
        switch($_COOKIE['op']) {
            case "+":
                $result = $_COOKIE['num'] + $num;
                break;
            case "-":
                $result = $_COOKIE['num'] - $num;
                break;
            case "x": 
                $result = $_COOKIE['num'] * $num;
                break;
            case "/":
                $result = $_COOKIE['num'] / $num;
                break;
        }
        $num = $result;
        setcookie($cookie_name1, $num, time()+(86400*30), "/");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body{
            background-color: rgb(163, 159, 159);
        }
       
        .calc{
            
            margin: auto;
            background-color: black;
            border: 2px solid whitesmoke;
            width: 24%;
            height: 630px;
            border-radius: 20px;
            box-shadow: 10px 10px 40px;
        }
        .maininput{
            background-color: black;
            border: 1px solid grey;
            height: 125px;
            width: 98.2%;
            font-size: 80px;
            color: whitesmoke;
            font-weight: 00;
        }
        .numbtn{
            margin-left: 3%;
            padding: 35px 40px;
            border-radius: 50px;
            font-weight: 500;
            font-size: large;
            background-color: rgb(155, 154, 154);
        }
        .numbtn:hover{
            background-color: rgb(136, 133, 133);
            color: whitesmoke;
        }
        .calbtn{
            margin-left: 3%;
            padding: 30px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 30px;
            background-color: orange;
        }
        .calbtn:hover{
            background-color: rgb(211, 140, 7);
            color: whitesmoke;
        }
        .c{
            margin-left: 3%;
            padding: 30px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: large;
            background-color: red;
        }
        .c:hover{
            background-color: rgb(188, 16, 16);
            color: whitesmoke;
        }
        .equal{
            margin-left: 6%;
            padding: 30px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: large;
            background-color: rgb(8, 181, 8);
        }
        .equal:hover{
            background-color: green;
            color: whitesmoke;
        }

    </style>
</head>
<body>
<div class="calc">
        <form id="calculator">
            <br>
            <input type="text" class="maininput" id="input" value=""> <br> <br>
            <input type="button" class="numbtn" value="7" onclick="appendNum('7')">
            <input type="button" class="numbtn" value="8" onclick="appendNum('8')">
            <input type="button" class="numbtn" value="9" onclick="appendNum('9')">
            <input type="button" class="calbtn" value="+" onclick="setOperator('+')"> <br><br>
            <input type="button" class="numbtn" value="4" onclick="appendNum('4')">
            <input type="button" class="numbtn" value="5" onclick="appendNum('5')">
            <input type="button" class="numbtn" value="6" onclick="appendNum('6')">
            <input type="button" class="calbtn" value="-" onclick="setOperator('-')"><br><br>
            <input type="button" class="numbtn" value="1" onclick="appendNum('1')">
            <input type="button" class="numbtn" value="2" onclick="appendNum('2')">
            <input type="button" class="numbtn" value="3" onclick="appendNum('3')">
            <input type="button" class="calbtn" value="x" onclick="setOperator('x')"><br><br>
            <input type="button" class="c" value="C" onclick="clearInput()">
            <input type="button" class="numbtn" value="0" onclick="appendNum('0')">
            <input type="button" class="equal" value="=" onclick="calculate()">
            <input type="button" class="calbtn" value="/" onclick="setOperator('/')">
        </form>
    </div>

   <script>
    function appendNum(num) {
        document.getElementById('input').value += num;
    }

function setOperator(op) {
    if (op === 'x') {
        document.getElementById('input').value += 'x';
    } else {
        document.getElementById('input').value += op;
    }
}

    function clearInput() {
        document.getElementById('input').value = '';
    }

function calculate() {
    var input = document.getElementById('input').value;
    input = input.replace(/x/g, '*');
    var result = eval(input);
    document.getElementById('input').value = result;
}
</script>

</body>
</html>
