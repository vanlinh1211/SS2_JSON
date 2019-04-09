<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Registration Form</h1>
<form action="" method="post">
    Name: <input type="text" name="name" placeholder="Enter Name">
    E-mail: <input type="text" name="email" placeholder="Enter Email">
    Phone: <input type="text" name="phone" placeholder="Enter Phone">
    <input type="submit" value="Register">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    function registerUser($name, $email, $phone)
    {
        if (empty($name) || empty($email) || empty($phone)) {
            echo "Empty failed";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo false;
        } else {
            if (file_exists('user.json')) {
                $current_data = file_get_contents('user.json');
                $array_data = json_decode($current_data, true);
                $input_array = [
                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone
                ];
                array_push($array_data, $input_array);
                $final_data = json_encode($array_data);
                file_put_contents('user.json', $final_data);
                echo "Success Added";
            } else {
                echo "json file not exist";
            }
        }
    }
}

registerUser($name, $email, $phone);
?>
</body>
</html>