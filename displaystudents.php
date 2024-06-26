<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Year Selection</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            display : flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height:100vh;
            background: #606C5D;
            color: #fff;
            width:100%;
            font-size: 30px;
        }

        input{
            margin: 10px;
        }
        label{
            color:#F1C376;
        }
        /* submit button */
        input[type=submit] {
            background-color: #F1C376;
            color: #606C5D;
            padding: 16px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        h1{
            color:#FFF4F4;
        }
        </style>

</head>

<body>

    <h1>Year Selection</h1>
   <form action="" method="post">
       <input type="checkbox" name="year[]" value="first" id="first-year">
       <label for="first-year">First Year</label>
      <br>
      <input type="checkbox" name="year[]" value="second" id="second-year">
      <label for="second-year">Second Year</label>
      <br>
      <input type="checkbox" name="year[]" value="third" id="third-year">
      <label for="third-year">Third Year</label>
      <br>
      <input type="checkbox" name="year[]" value="fourth" id="fourth-year">
      <label for="fourth-year">Fourth Year</label>
      <br>
      <input type="checkbox" name="year[]" value="all" id="all-year">
      <label for="all-year">All Year</label>
      <br>
      <input type="submit" value="Submit">
   </form>

   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["year"])) {
         $selectedYears = $_POST["year"];
         foreach ($selectedYears as $year) {
            $page = "display" . $year . ".php";
            header("Location: $page");
            exit();
         }
      }
   }
   ?>
</body>
</html>
