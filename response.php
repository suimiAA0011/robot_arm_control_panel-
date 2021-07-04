<?php

$con = mysqli_connect('localhost', 'suimi', '1234', 'robot_arm_controlpanel');
//check connection
if (!$con) {
    echo 'connection error:' . mysqli_connect_error();
}
//echo "Information: Connected successfully, the response";

$sql = 'SELECT * FROM robot_motors ORDER BY created_at DESC LIMIT 1';
//make query and get results
$results = mysqli_query($con, $sql);
//fetch the resulting rows as an array
$info = mysqli_fetch_array($results, MYSQLI_ASSOC);
//print_r($info);
// free results from memory
mysqli_free_result($results);
//close the connection
mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
            width: 40%;
            height: 60%;
        }
    </style>
</head>

<body>
    <div class="center">
        <p class="center">
        <h5><em>RobotAram Motors Values</em></h3>
            </p>
    </div>
    <div class=" container center indigo lighten-5">
        <div class="left-align">
            <label class="flow-text" for="">id:</label>
            <h6>
                <?php echo $info['id']; ?>
            </h6>
            <label class="flow-text" for="">motor1:</label>
            <h6>
                <?php echo $info['motor_1']; ?>
            </h6>
            <label class="flow-text" for="">motor2:</label>
            <h6>
                <?php echo $info['motor_2']; ?>
            </h6>
            <label class="flow-text" for="">motor3:</label>
            <h6>
                <?php echo $info['motor_3']; ?>
            </h6>
            <label class="flow-text" for="">motor4:</label>
            <h6>
                <?php echo $info['motor_4']; ?>
            </h6>
            <label class="flow-text" for="">motor5:</label>
            <h6>
                <?php echo $info['motor_5']; ?>
            </h6>
            <label class="flow-text" for="">motor6:</label>
            <h6>
                <?php echo $info['motor_6']; ?>
            </h6>
            <label class="flow-text" for="">date:</label>
            <h6>
                <?php echo $info['created_at']; ?>
            </h6>
        </div>
    </div>
</body>

</html>