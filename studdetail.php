<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-top: 0;
        }

        p {
            margin-bottom: 10px;
        }
        .back-button {
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
        .logout-button{
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
</head>
<body>
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the ID parameter is provided in the URL
    if (isset($_GET['stud_id'])) {
        $id = $_GET['stud_id'];

        // Prepare and execute the query to fetch the students details by ID
        $stmt = $conn->prepare("SELECT * FROM students WHERE stud_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // students details found, display the information
            $row = $result->fetch_assoc();
            echo "<h2>Student Details</h2>";
            echo "<p><strong>student:</strong> " . $row['stud_id'] . "</p>";
            echo "<p><strong>student Name:</strong> " . $row['name'] . "</p>";
            echo "<p><strong>Room:</strong> " . $row['room_id'] . "</p>";
            echo "<p><strong>dept:</strong> " . $row['dept'] . "</p>";
            echo "<p><strong>Year:</strong> " . $row['year'] . "</p>";
            echo "<p><strong>gender:<strong> " . $row['gender'] . "</p>";
        } else {
            // No students details found for the given ID
            echo "<h2>Error</h2>";
            echo "<p>students not found.</p>";
        }
    } else {
        // No ID parameter provided in the URL
        echo "<h2>Error</h2>";
        echo "<p>Invalid request. Please provide a valid students ID.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
    <a href="https://localhost/hostelapp/displaystudents.php" class="back-button">Back</a>
    <a href="https://localhost/hostelapp/login.php" class="logout-button">Log out</a>
</body>
</html>
