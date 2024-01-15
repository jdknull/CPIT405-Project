<?php
include 'header.php';

// Include the database connection file
require_once 'db.php';

// Check if delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Retrieve and sanitize the ID of the row to be deleted
    $id = $_POST['id'];

    // Validate the ID
    if (!empty($id)) {
        // Execute the DELETE query
        $sql = "DELETE FROM project WHERE ID = $id";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("One record Deleted.");</script>';
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Invalid ID";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view.css">
    <script src="script.js"></script>
    <title>View Patent</title>
</head>

<body>
    <div class="for_table">
        <table class="view_one">
            <tr>
                <th id="id-header">ID</th>
                <th id="title-header">Patent Title</th>
                <th id="inventors-header">Inventors</th>
                <th id="affiliation-header">Affiliation</th>
                <th id="date-header">Release Date</th>
                <th id="area-header">Area</th>
                <th colspan="2" class="action">Action</th>
            </tr>
            <?php
            // Retrieve data from the table
            $sql = "SELECT ID, Patent_Title, Inventors, Affiliation, Date_, Area FROM project";
            $result = $conn->query($sql);

            // Check if any rows are returned
            if ($result->num_rows > 0) {
                // Output the data
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='id_one'>" . $row['ID'] . "</td>";
                    echo "<td class='title'>" . $row['Patent_Title'] . "</td>";
                    echo "<td class='inventors'>" . $row['Inventors'] . "</td>";
                    echo "<td class='aff'>" . $row['Affiliation'] . "</td>";
                    echo "<td class='date'>" . $row['Date_'] . "</td>";
                    echo "<td class='area'>" . $row['Area'] . "</td>";
                    echo "<td><div class='for_btn'><a href='edit.php?id=" . $row['ID'] . "' class='btn_one'>Update</a></div>";                    echo "<td>
                            <form method='POST' action=''>
                                <input type='hidden' name='id' value='" . $row['ID'] . "'>
                                <button type='submit' class='btn_two' name='delete'>Delete</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found.</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>