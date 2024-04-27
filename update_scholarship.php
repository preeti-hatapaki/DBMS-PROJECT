<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Scholarship</title>
    <link rel="stylesheet" type="text/css" href="create.css">

</head>
<style>
        /* Navbar styles */
        .navbar {
            background-color: #4E6479;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
<body>
    <h2>Update Scholarship</h2>
    <?php
    // Include the database connection file
    include "connection.php";

    // Check if scholarship ID is provided in the URL
    if(isset($_GET['id'])) {
        $scholarship_id = $_GET['id'];

        // SQL query to retrieve scholarship details based on ID
        $sql = "SELECT * FROM scholarship WHERE scholarship_id = '$scholarship_id'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if scholarship exists
        if (mysqli_num_rows($result) == 1) {
            // Fetch scholarship details
            $row = mysqli_fetch_assoc($result);

            // Display form with scholarship details
            echo '<form action="update_scholarship_process.php" method="post">';
            echo '<input type="hidden" name="scholarship_id" value="' . $scholarship_id . '">';
            echo 'Scholarship Name: <input type="text" name="scholarship_name" value="' . $row["scholarship_name"] . '"><br>';
            echo 'Caste: <input type="text" name="caste" value="' . $row["caste"] . '"><br>';
            echo 'State: <input type="text" name="state" value="' . $row["state"] . '"><br>';
            echo 'Gender: <input type="text" name="gender" value="' . $row["gender"] . '"><br>';
            echo '10th Score: <input type="number" name="tenth_score" value="' . $row["tenth_score"] . '"><br>';
            echo '12th Score: <input type="number" name="twelfth_score" value="' . $row["twelfth_score"] . '"><br>';
            echo 'Nationality: <input type="text" name="nationality" value="' . $row["nationality"] . '"><br>';
            echo 'Annual Income: <input type="number" name="annual_income" value="' . $row["annual_income"] . '"><br>';
            echo 'Grant Amount: <input type="number" name="grant_amount" value="' . $row["grant_amount"] . '"><br>';
            echo 'Scholarship desc: <textarea name="scholarship_desc">' . $row["scholarship_desc"] . '</textarea><br>';
            // Add more fields as needed

            echo '<input type="submit" value="Update">';
            echo '</form>';
        } else {
            echo "Scholarship not found.";
        }
    } else {
        echo "Scholarship ID not provided.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
