<?php
include 'db.php';
include 'header.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $patentId = $_POST['id'];
    $title = $_POST['title'];
    $inventors = $_POST['Inventors'];
    $affiliation = $_POST['Affilation'];
    $issueDate = $_POST['issue_date'];
    $area = $_POST['area'];

    // Insert the data into the database
    $sql = "INSERT INTO project (ID, Patent_Title, Inventors, Affiliation, Date_, Area)
            VALUES ('$patentId', '$title', '$inventors', '$affiliation', '$issueDate', '$area')";

    if (mysqli_query($conn, $sql)) {
        // Display JavaScript alert after successful insertion
        echo '<script>alert("One record inserted.");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/insert.css">
    <script src="script.js"></script>

    <title>Insert new patent</title>
</head>

<body>
    <div class="container_form">
        <div class="insert">
            <h1>Insert new patent</h1>

            <form method="POST" action="insert.php">
                <label for="id">ID</label>
                <input type="number" class="id_insert" name="id" required placeholder="Enter Patent ID">
                <label for="title">Patent Title</label>
                <input type="text" class="title_insert" name="title" required placeholder="Enter Patent Title">
                <br><br>
                <label for="Inventors">Inventors Names</label>
                <input type="text" class="name_insert" name="Inventors" required placeholder="Enter Inventors name">
                <label for="affiliation">Affiliation</label>
                <input type="text" style="margin-left: 15px;" class="affiliation_insert" name="Affilation" required placeholder="Enter Affiliation Name">
                <br><br>
                <label for="date">Issue Date</label>
                <input type="date" style="margin-left: 50px;" name="issue_date" class="date_insert" required placeholder="Enter Issue Date">
                <label for="Area">Area</label>
                <input type="text" style="margin-left: 40px;" class="area_insert" name="area" required placeholder="Enter Area">
                <br><br>
                <input type="submit" value="Submit" class="submit">
                <button class="cancel" onclick="main_page()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function main_page() {
            window.location.href = "main.php";
        }
    </script>
</body>

</html>