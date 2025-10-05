<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Dashboard</title>
    <style>
        /* Table styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            border: 1px solid #444;
            padding: 10px 15px;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }

        /* Column widths */
        th.name-col, td.name-col {
            width: 50%;   /* Name takes half of table width */
            white-space: nowrap;
        }
        th.rollno-col, td.rollno-col {
            width: 25%;
        }
        th.class-col, td.class-col {
            width: 25%;
        }
    </style>
</head>
<body>
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption><b>Manage Students</b></caption>
                <tr>
                    <th class='name-col'>NAME</th>
                    <th class='rollno-col'>ROLL NO</th>
                    <th class='class-col'>CLASS</th>
                </tr>";

                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td class='name-col'>" . $row['name'] . "</td>";
                    echo "<td class='rollno-col'>" . $row['rno'] . "</td>";
                    echo "<td class='class-col'>" . $row['class_name'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p style='text-align:center;'>0 Students</p>";
            }
        ?>
    </div>

    <div class="footer"></div>
</body>
</html>
