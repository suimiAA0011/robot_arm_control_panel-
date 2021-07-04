<?php
$con = mysqli_connect('localhost', 'suimi', '1234', 'robot_arm_controlpanel');
//check connection
if (!$con) {
    echo 'connection error:' . mysqli_connect_error();
}
//echo "Information: Connected successfully, the response";
if (isset($_POST['save-submit'])) {
    $motor1 =  $_POST['motor1'];
    $motor2 =  $_POST['motor2'];
    $motor3 = $_POST['motor3'];
    $motor4 =  $_POST['motor4'];
    $motor5 = $_POST['motor5'];
    $motor6 =  $_POST['motor6'];
    $sql = "INSERT INTO `robot_motors` (`id`, `motor_1`, `motor_2`, `motor_3`, `motor_4`, `motor_5`, `motor_6`, `created_at`) VALUES (NULL, '$motor1', '$motor2', '$motor3', '$motor4', '$motor5', '$motor6', current_timestamp())"; //save to db and check
    if (mysqli_query($con, $sql)) {
        //success
        echo "New record created successfully";
        header('Location:index.php');
    } else {
        //error
        echo 'query error' . mysqli_errno($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        .container {
            margin-top: 30px;
            margin-bottom: 80px;
            width: 60%;
            height: 40%;
        }

        .slidecontainer {
            width: 80%;
            margin-left: 80px;
            margin-top: 5px;
            height: 15%;
            padding: 5px;
        }

        input[type='range']::-webkit-slider-thumb {
            width: 15px;
            -webkit-appearance: none;
            height: 15px;
            cursor: pointer;
            background: blue;

        }

        .slider {
            -google-appearance: none;
            width: 100%;
            height: 20px;
            background: #7c4dff;
            color: blue;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-google-slider-thumb {
            -google-appearance: none;
            appearance: none;
            width: 25px;
            height: 20px;
            background: #7c4dff;
            color: blue;
            cursor: pointer;
        }

        .slider::-google-range-thumb {
            width: 25px;
            height: 22px;
            background: #7c4dff;
            color: blue;
            cursor: pointer;
        }

        .btn-floating {
            width: 80px;
            height: 80px;
        }

        #bt2 {
            margin-left: 40px;
        }

        button {
            border: none;
            height: 10px;
        }

        
        
    </style>
</head>

<body>
    <div class="container center ">
        <div class="slidecontainer center indigo lighten-5">
            <form action="" method="POST">
                <div class="left-align">
                    <label for="customRange1" class=" flow-text  blue-grey lighten-5 black-text form-label">motor1</label>
                </div>
                <div class="slidecontainer">
                    <input type="range" min="0" max="180" value="90" class="slider indigo accent-1" name="motor1" id="myRange1">
                    <em>
                        <p class="center">Value: <span id="demo1"></span></p>
                    </em>

                </div>
                <div class="left-align">
                    <label for="customRange1" class="flow-text  blue-grey lighten-5 black-text form-label">motor2</label>
                </div>
                <div class="slidecontainer ">
                    <input type="range" min="0" max="180" value="90" class="slider indigo accent-1" name="motor2" id="myRange2">
                    <em>
                        <p class="center">Value: <span id="demo2"></span></p>
                    </em>
                </div>
                <div class="left-align">
                    <label for="customRange1" class="flow-text  blue-grey lighten-5 black-text form-label">motor3</label>
                </div>
                <div class="slidecontainer">
                    <input type="range" min="0" max="180" value="90" class="slider indigo accent-1" name="motor3" id="myRange3">
                    <em>
                        <p class="center">Value: <span id="demo3"></span></p>
                    </em>

                </div>
                <div class="left-align">
                    <label for="customRange1" class="flow-text  blue-grey lighten-5 black-text form-label">motor4</label>
                </div>
                <div class="slidecontainer">
                    <input type="range" min="0" max="180" value="90" class="slider indigo accent-1" name="motor4" id="myRange4">
                    <em>
                        <p class="center">Value: <span id="demo4"></span></p>
                    </em>
                </div>
                <div class="left-align">
                    <label for="customRange1" class="flow-text  blue-grey lighten-5 black-text form-label">motor5</label>
                </div>
                <div class="slidecontainer">
                    <input type="range" min="0" max="180" value="90" class="slider indigo accent-1" name="motor5" id="myRange5">
                    <em>
                        <p class="center">Value: <span id="demo5"></span></p>
                    </em>

                </div>
                <div class="left-align">
                    <label for="customRange1" class="flow-text  blue-grey lighten-5 black-text form-label">motor6</label>
                </div>
                <div class="slidecontainer ">
                    <input type="range" min="0" max="180" value="90" class="slider indigo accent-1 " name="motor6" id="myRange6">
                    <em>
                        <p class="center ">Value: <span id="demo6"></span></p>
                    </em>
                </div>
                <div class="center z-depth-0
         ">
                    <button class="btn-floating" type="submit" name="save-submit" id="save-submit">
                        <a href="#" class="btn-floating  blue-grey darken-1 waves-effect waves-light" id="bt1">
                            <p class="center flow-text"><em>save</em></p>
                        </a>
                    </button>
                    <button class="indigo lighten-5" type="submit" name="run-submit" id="run-submit">
                        <a href="response.php" class="btn-floating blue-grey darken-1 waves-effect waves-light" id="bt2" name="run">
                            <p class="center flow-text"><em>run</em></p>
                        </a>
                    </button>

                </div>
            </form>
        </div>
    </div>


    <script>
        var slider1 = document.getElementById("myRange1");
        var output1 = document.getElementById("demo1");
        output1.innerHTML = slider1.value;

        slider1.oninput = function() {
            output1.innerHTML = this.value;
        }
    </script>
    <script>
        var slider2 = document.getElementById("myRange2");
        var output2 = document.getElementById("demo2");
        output2.innerHTML = slider2.value;

        slider2.oninput = function() {
            output2.innerHTML = this.value;
        }
    </script>
    <script>
        var slider3 = document.getElementById("myRange3");
        var output3 = document.getElementById("demo3");
        output3.innerHTML = slider3.value;

        slider3.oninput = function() {
            output3.innerHTML = this.value;
        }
    </script>
    <script>
        var slider4 = document.getElementById("myRange4");
        var output4 = document.getElementById("demo4");
        output4.innerHTML = slider4.value;

        slider4.oninput = function() {
            output4.innerHTML = this.value;
        }
    </script>
    <script>
        var slider5 = document.getElementById("myRange5");
        var output5 = document.getElementById("demo5");
        output5.innerHTML = slider5.value;

        slider5.oninput = function() {
            output5.innerHTML = this.value;
        }
    </script>
    <script>
        var slider6 = document.getElementById("myRange6");
        var output6 = document.getElementById("demo6");
        output6.innerHTML = slider6.value;

        slider6.oninput = function() {
            output6.innerHTML = this.value;
        }
    </script>
</body>

</html>