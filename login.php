<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "authtest";

session_start();

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("connection_error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from login where username='" . $username . "' AND password='" . $password . "'";

    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row === null) {
        echo "wrong";
    } elseif ($row["role"] == "user") {
        $_SESSION["username"] = $username;
        header("location:userhome.php");
    } elseif ($row["role"] == "admin") {
        $_SESSION["username"] = $username;
        header("location:adminhome.php");

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
</head>

<body>

    <div>
        <h1>Login Form</h1>
        <form action="#" method="POST">
            <?php echo $_SESSION["username"] ?>
            <div>
                <div>
                    <label>username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label>password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    <input type="submit" value="Login">
                </div>
            </div>
        </form>
    </div>


</body>

</html>