<?php
include 'header.php';

// Include the database connection file
require_once 'db.php';

// Check if form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve and sanitize the ID and other form data
    $id = $_POST['id'];
    $patentTitle = $_POST['patent_title'];
    $inventors = $_POST['Inventors'];
    $affiliation = $_POST['affiliation'];
    $date = $_POST['issue_date'];
    $area = $_POST['area'];

    // Validate the ID
    if (!empty($id)) {
        // Update the row in the database
        $sql = "UPDATE project SET Patent_Title = '$patentTitle', Inventors = '$inventors', Affiliation = '$affiliation', Date_ = '$date', Area = '$area' WHERE ID = $id";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
            alert("Record updated successfully.");
            window.location.href = "view.php";
          </script>';

        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid ID";
    }
}

// Retrieve the ID from the query parameter
$id = $_GET['id'];

// Fetch the existing data from the database based on the ID
$sql = "SELECT ID, Patent_Title, Inventors, Affiliation, Date_, Area FROM project WHERE ID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $patentTitle = $row['Patent_Title'];
    $inventors = $row['Inventors'];
    $affiliation = $row['Affiliation'];
    $date = $row['Date_'];
    $area = $row['Area'];
} else {
    echo "No record found for the given ID";
    exit;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/insert.css">
    <script src="script.js"></script>
    <title>Edit Patent</title>
</head>

<body>
    <div class="edit-form">
        <h2>Edit Patent</h2>
        <form method="POST">
            <label for="id">ID</label>
            <input type="number" class="id_insert" name="id" readonly value="<?php echo $id; ?>">
            <label for="title">Patent Title</label>
            <input type="text" class="title_insert" name="patent_title" required value="<?php echo $patentTitle; ?>">
            <br><br>
            <label for="Inventors">Inventors Names</label>
            <input type="text" class="name_insert" name="Inventors" required value="<?php echo $inventors; ?>">
            <label for="affiliation">Affiliation</label>
            <input type="text" style="margin-left: 15px;" class="affiliation_insert" name="affiliation" required value="<?php echo $affiliation; ?>">
            <br><br>
            <label for="date">Issue Date</label>
            <input type="date" style="margin-left: 50px;" name="issue_date" class="date_insert" required value="<?php echo $date; ?>">
            <label for="Area">Area</label>
            <input type="text" style="margin-left: 40px;" class="area_insert" name="area" required value="<?php echo $area; ?>">
            <br><br>
            <input type="submit" value="Submit" class="submit" name="update">
            <button class="cancel" onclick="main_page()">Cancel</button>
        </form>
    </div>
</body>

</html>