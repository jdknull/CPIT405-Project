<?php
include 'db.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="css/search.css">
    <title>Search</title>
</head>
<body>
    <h1>Search</h1>

    <form action="" method="POST">
        <label for="search-criteria">Search By: </label>
        <select name="search-criteria" id="search-criteria" onchange="showInputField()">
            <option value="select">Select One</option>
            <option value="id">ID</option>
            <option value="title">Patent Title</option>
            <option value="year">Year</option>
        </select>
        <br><br>
        <div id="input-field-container"></div>
        <br>
        <input type="submit" value="Search">
    </form>

    <script>
    function showInputField() {
        var searchCriteria = document.getElementById("search-criteria").value;
        var inputFieldContainer = document.getElementById("input-field-container");
        inputFieldContainer.innerHTML = "";

        if (searchCriteria === "id") {
            var inputField = document.createElement("input");
            inputField.setAttribute("type", "number");
            inputField.setAttribute("name", "search-text");
            inputField.setAttribute("placeholder", "Enter ID");
            inputFieldContainer.appendChild(inputField);
        } else if (searchCriteria === "title") {
            var inputField = document.createElement("input");
            inputField.setAttribute("type", "text");
            inputField.setAttribute("name", "search-text");
            inputField.setAttribute("placeholder", "Enter Patent Title");
            inputFieldContainer.appendChild(inputField);
        } else if (searchCriteria === "year") {
            var inputField = document.createElement("input");
            inputField.setAttribute("type", "text");
            inputField.setAttribute("name", "search-text");
            inputField.setAttribute("placeholder", "Enter Year (e.g., 2022)");
            inputFieldContainer.appendChild(inputField);
        }
    }
    </script>

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
            if (isset($_POST['search-criteria'])) {
                $searchCriteria = $_POST['search-criteria'];
                $searchText = $_POST['search-text'];

                // Construct the SQL query based on the search criteria and input value
                if ($searchCriteria === 'id') {
                    $sql = "SELECT ID, Patent_Title, Inventors, Affiliation, Date_, Area FROM project WHERE ID=$searchText";
                } elseif ($searchCriteria === 'title') {
                    $sql = "SELECT ID, Patent_Title, Inventors, Affiliation, Date_, Area FROM project WHERE Patent_Title LIKE '%$searchText%'";
                } elseif ($searchCriteria === 'year') {
                    $sql = "SELECT ID, Patent_Title, Inventors, Affiliation, Date_, Area FROM project WHERE YEAR(Date_) = $searchText";
                }

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
                        echo "<td><div class='for_btn'><a href='edit.php?id=" . $row['ID'] . "' class='btn_one'>Update</a></div></td>";
                        echo "<td>
                            <form method='POST' action=''>
                                <input type='hidden' name='id' value='" . $row['ID'] . "'>
                                <button type='submit' class='btn_two' name='delete'>Delete</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found.</td></tr>";
                }
            }
            ?>

        </table>
    </div>

<?php
// Close the connection
$conn->close();
?>
</body>
</html>