<!DOCTYPE html>
<html>
<head>
    <title>students Values</title>
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

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td:first-child, th:first-child {
            text-align: center;
            width: 10%;
        }

        td, th {
            text-align: left;
        }

        td:last-child {
            width: 30%;
        }

        .view-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 6px 10px;
            text-align: center;
            text-decoration: none;
            students: inline-block;
            font-size: 12px;
            margin-top: 4px;
            cursor: pointer;
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
    <h2>students Values</h2>
    
    <table>
        <tr>
            <th>Stud_Id</th>
            <th>Name</th>
            <th>room_id</th>
            
        </tr>
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
        
        // Fetch data from the 'students' table
        $query = "SELECT * FROM students";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["stud_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["room_id"] . "</td>";
                echo "<td><a href='studdetail.php?stud_id=" . $row["stud_id"] . "' class='view-button'>View Details </a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        
        // Close the database connection
        $conn->close();
        ?>
    </table>
    <a href="https://localhost/hostelapp/displaystudents.php" class="back-button">Back</a>
    <a href="https://localhost/hostelapp/login.php" class="logout-button">Log out</a>
</body>
</html>
