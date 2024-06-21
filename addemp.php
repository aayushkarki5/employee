<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee | Employee Management System</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <!-- Font family -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS -->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <header>
        <nav>
            <h1>EMS</h1>
            <ul id="navli">
                <li><a class="homeblack" href="aloginwel.php">HOME</a></li>
                <li><a class="homered" href="addemp.php">Add Employee</a></li>
                <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="divider"></div>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Name" name="firstName" required="required">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Address" name="address" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Contact Number" name="contact" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Total Number of Family" name="familyno" required="required">
                        </div>

                        <div class="input-group">
                            <textarea class="input--style-1" placeholder="Family Description" name="familydescription" rows="4" cols="50" required="required"></textarea>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="file" name="fa_ph" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="file" name="mo_pH" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="file" name="mother" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="file" name="father" required="required">
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS -->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS -->
    <script src="js/global.js"></script>
</body>

</html>
