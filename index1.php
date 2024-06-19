<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 1em;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5em;
        }
        .form-group input {
            width: 100%;
            padding: 0.5em;
        }
        .operations button {
            margin-right: 1em;
        }
        .employee-list {
            margin-top: 2em;
        }
        .search-container {
            margin-bottom: 2em;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Employee Management</h1>

    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="grandfather_name">Grandfather's Name:</label>
            <input type="text" id="grandfather_name" name="grandfather_name" required>
        </div>
        <div class="form-group">
            <label for="father_citizenship_photo">Father's Citizenship Photo:</label>
            <input type="file" id="father_citizenship_photo" name="father_citizenship_photo" required>
        </div>
        <div class="form-group">
            <label for="mother_citizenship_photo">Mother's Citizenship Photo:</label>
            <input type="file" id="mother_citizenship_photo" name="mother_citizenship_photo" required>
        </div>
        <div class="form-group">
            <label for="father_photo">Father's Photo:</label>
            <input type="file" id="father_photo" name="father_photo" required>
        </div>
        <div class="form-group">
            <label for="mother_photo">Mother's Photo:</label>
            <input type="file" id="mother_photo" name="mother_photo" required>
        </div>
        <div class="form-group">
            <label for="total_family_members">Total Number of Family Members:</label>
            <input type="number" id="total_family_members" name="total_family_members" required>
        </div>
        <div class="form-group">
            <label for="family_description">Family Description:</label>
            <textarea id="family_description" name="family_description" rows="4"cols="60" maxlength="900" required></textarea>
        </div>
        <div class="form-group">
            <label for="property_assets_description">Property or Assets Description:</label>
            <textarea id="property_assets_description" name="property_assets_description" rows="4" cols="60" required></textarea>
        </div>
        <div class="operations">
            <button type="submit" name="action" value="insert">Insert</button>
            <button type="submit" name="action" value="update">Update</button>
            <button type="submit" name="action" value="delete">Delete</button>
            <button type="reset">Clear</button>
        </div>
    </form>
</div>

<div class="employee-list">
    <h2>Employee List</h2>
    <?php
    // Initialize an array to store family details
    $families = isset($_SESSION['families']) ? $_SESSION['families'] : [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];
        $name = $_POST['name'];
        $grandfather_name = $_POST['grandfather_name'];
        $father_citizenship_photo = $_FILES['father_citizenship_photo']['name'];
        $mother_citizenship_photo = $_FILES['mother_citizenship_photo']['name'];
        $father_photo = $_FILES['father_photo']['name'];
        $mother_photo = $_FILES['mother_photo']['name'];
        $total_family_members = $_POST['total_family_members'];
        $family_description = $_POST['family_description'];
        $property_assets_description = $_POST['property_assets_description'];

        switch ($action) {
            case 'insert':
                $families[$name] = [
                    'name' => $name,
                    'grandfather_name' => $grandfather_name,
                    'father_citizenship_photo' => $father_citizenship_photo,
                    'mother_citizenship_photo' => $mother_citizenship_photo,
                    'father_photo' => $father_photo,
                    'mother_photo' => $mother_photo,
                    'total_family_members' => $total_family_members,
                    'family_description' => $family_description,
                    'property_assets_description' => $property_assets_description,
                ];
                move_uploaded_file($_FILES['father_citizenship_photo']['tmp_name'], "uploads/$father_citizenship_photo");
                move_uploaded_file($_FILES['mother_citizenship_photo']['tmp_name'], "uploads/$mother_citizenship_photo");
                move_uploaded_file($_FILES['father_photo']['tmp_name'], "uploads/$father_photo");
                move_uploaded_file($_FILES['mother_photo']['tmp_name'], "uploads/$mother_photo");
                break;
            case 'update':
                if (isset($families[$name])) {
                    $families[$name] = [
                        'name' => $name,
                        'grandfather_name' => $grandfather_name,
                        'father_citizenship_photo' => $father_citizenship_photo,
                        'mother_citizenship_photo' => $mother_citizenship_photo,
                        'father_photo' => $father_photo,
                        'mother_photo' => $mother_photo,
                        'total_family_members' => $total_family_members,
                        'family_description' => $family_description,
                        'property_assets_description' => $property_assets_description,
                    ];
                    move_uploaded_file($_FILES['father_citizenship_photo']['tmp_name'], "uploads/$father_citizenship_photo");
                    move_uploaded_file($_FILES['mother_citizenship_photo']['tmp_name'], "uploads/$mother_citizenship_photo");
                    move_uploaded_file($_FILES['father_photo']['tmp_name'], "uploads/$father_photo");
                    move_uploaded_file($_FILES['mother_photo']['tmp_name'], "uploads/$mother_photo");
                }
                break;
            case 'delete':
                if (isset($families[$name])) {
                    unset($families[$name]);
                }
                break;
        }

        // Save the families to the session
        $_SESSION['families'] = $families;
    }

    // Display the family list
    if (!empty($families)) {
        echo "<table class='family-list'>";
        echo "<tr><th>Name</th><th>Grandfather's Name</th><th>Total Family Members</th><th>Family Description</th><th>Property/Assets Description</th><th>Father's Citizenship Photo</th><th>Mother's Citizenship Photo</th><th>Father's Photo</th><th>Mother's Photo</th></tr>";
        
        foreach ($families as $family) {
            echo "<tr>";
            echo "<td>{$family['name']}</td>";
            echo "<td>{$family['grandfather_name']}</td>";
            echo "<td>{$family['total_family_members']}</td>";
            echo "<td>{$family['family_description']}</td>";
            echo "<td>{$family['property_assets_description']}</td>";
            echo "<td><img src='uploads/{$family['father_citizenship_photo']}' alt='Father&apos;s Citizenship Photo' width='50'></td>";
            echo "<td><img src='uploads/{$family['mother_citizenship_photo']}' alt='Mother&apos;s Citizenship Photo' width='50'></td>";
            echo "<td><img src='uploads/{$family['father_photo']}' alt='Father&apos;s Photo' width='50'></td>";
            echo "<td><img src='uploads/{$family['mother_photo']}' alt='Mother&apos;s Photo' width='50'></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>No families found.</p>";
    }
    echo "<p>Total Number of Families: " . count($families) . "</p>";
    ?>

</div>

</body>
</html>
