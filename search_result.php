<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Search Results</h1>
    <?php
    require_once "settings.php";
    
    // Database connection toiri kora holo
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if ($conn) {
        // $_GET['model'] theke data asche kina check kora hocche
        if (isset($_GET['model'])) {
            // SQL injection theke bachte input sanitize kora hocche
            $model = mysqli_real_escape_string($conn, $_GET['model']);
            
            // Incomplete query ti replace kora holo
            $sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Obsolete border='1' er bodole CSS style kora table
                echo "<table>";
                echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['car_id'] . "</td>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['yom'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No matching cars found.</p>";
            }
        } else {
            echo "<p>Please enter a model to search.</p>";
        }
        mysqli_close($conn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
    ?>
</body>
</html>