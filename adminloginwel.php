<?php 
require_once('process/dbh.php');

// Corrected table name from 'employee' to 'employees'
$sql = "SELECT id, firstName, address, contact, familyno, familydescription, fa_ph, mo_pH, mother_citizenship, father_citizenship, created_at FROM employee ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Check for query execution errors
}
?>

<html>
<head>
    <title>Admin Panel | Employee Management System</title>
    <link rel="stylesheet" type="text/css" href="styleemplogin.css">
    <style>
        /* Add any additional CSS styles here */
    </style>
</head>
<body>
    <header>
        <nav>
            <h1>EMS</h1>
            <ul id="navli">
                <li><a class="homered" href="aloginwel.php">HOME</a></li>
                <li><a class="homeblack" href="addemp.php">Add Employee</a></li>
                <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="divider"></div>
    
    <div id="divimg">
        <h2 style="font-size: 25px; text-align: center;">Employee Leaderboard</h2>
        <table>
            <thead>
                <tr>
                    <th>Seq.</th>
                    <th>Emp. ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Family No.</th>
                    <th>Family Description</th>
                    <th>Father Photo</th>
                    <th>Mother Photo</th>
                    <th>Mother Citizenship</th>
                    <th>Father Citizenship</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $seq = 1;
                    while ($employee = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$seq."</td>";
                        echo "<td>".$employee['id']."</td>";
                        echo "<td>".$employee['firstName']."</td>";
                        echo "<td>".$employee['address']."</td>";
                        echo "<td>".$employee['contact']."</td>";
                        echo "<td>".$employee['familyno']."</td>";
                        echo "<td>".$employee['familydescription']."</td>";
                        echo "<td>".$employee['fa_ph']."</td>";
                        echo "<td>".$employee['mo_pH']."</td>";
                        echo "<td>".$employee['mother_citizenship']."</td>";
                        echo "<td>".$employee['father_citizenship']."</td>";
                        echo "<td>".$employee['created_at']."</td>";
                        echo "</tr>";
                        $seq += 1;
                    }
                    // Free result set
                    mysqli_free_result($result);
                ?>
            </tbody>
        </table>

        <div style="text-align: right;">
            <button class="btn" type="submit">
                <a href="reset.php" style="text-decoration: none; color: white;">Reset Points</a>
            </button>
        </div>
    </div>
</body>
</html>
