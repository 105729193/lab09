<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Cars</title>
</head>
<body>
    <h1>Search Car Model</h1>
    <!-- Search form er method "GET" hobe -->
    <form action="search_result.php" method="GET">
        <label for="model">Enter Car Model:</label>
        <input type="text" name="model" id="model" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>