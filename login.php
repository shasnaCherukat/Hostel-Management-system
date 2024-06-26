<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["logincode"];
    $password = $_POST["pwd"];

    // Prepare and execute a query to check the credentials
    $stmt = $conn->prepare("SELECT id, username FROM wardens WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Successful login, redirect to a dashboard or home page
        echo "Login successful.";
        // Redirect to welcome.php
        header("location: http://localhost/hostelapp/welcome.php");
        exit();
    } else {
        // Invalid credentials, display an error message
        $errorMessage = "Invalid Username or Password!";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warden Login</title>
  
</head>
<style>
  #errdiv{
    text-align: center;
  }
    .home{
    background-color: #808080;
    color: white;
    border: none;
    padding: 6px 10px;
    text-align: center;
    text-decoration: none;
    students: inline-block;
    font-size: 12px;
    margin-bottom: 10px;
    cursor: pointer;
  }
</style>
<body>
  <div class="bg-img">
    <form action="login.php" method="post">
    <img src="hostel.jpg" width="1500" height="500">
    <h1 style ="text-align:center; color:#800000;"><I>WARDEN LOGIN</h1></I>
    <h4 style="text-align:center;">
      <label for="username">Username</label>
      <input type="text" name="logincode" id="username" placeholder="Username" required>
      <label for="password">Password</label>
      <input type="password" name="pwd" id="password" placeholder="Password" required>
      <input type="submit" value="Login">
      
    </h4>
    <div id="errdiv"><?php echo isset($errorMessage) ? $errorMessage : ""; ?></div>
    <div><a href="https://localhost/hostelapp/homepage.html" class="home">HOME</a></div>
    </form>
  </div>
</body>
</html>
