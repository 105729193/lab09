<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Used Cars</title>
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
    <h1>Used Cars for Sale</h1>
    <?php
        require_once "settings.php";
        
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        
        if ($dbconn) {
            $query = "SELECT * FROM cars";
            $result = mysqli_query($dbconn, $query);
            
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year of Manufacture</th></tr>";
                    
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
                    echo "<p>There are no cars to display.</p>";
                }
            }
            mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the database.</p>";
        }
    ?>
</body>
</html>