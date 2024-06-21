<?php
require_once('process/dbh.php');

// Query to fetch all employees from the 'employees' table
$sql = "SELECT id, firstName, address, contact FROM employee ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employees</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <nav>
            <h1>EMS</h1>
            <ul id="navli">
                <li><a class="homeblack" href="aloginwel.php">HOME</a></li>
                <li><a class="homeblack" href="addemp.php">Add Employee</a></li>
                <li><a class="homered" href="viewemp.php">View Employee</a></li> <!-- Highlighting the current page -->
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="divider"></div>

    <div id="divimg">
        <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Employee List</h2>
        <table>
            <thead>
                <tr>
                    <th>Emp. ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($employee = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$employee['id']."</td>";
                    echo "<td>".$employee['firstName']."</td>";
                    echo "<td>".$employee['address']."</td>";
                    echo "<td>".$employee['contact']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>
