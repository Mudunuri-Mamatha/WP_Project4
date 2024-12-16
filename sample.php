<?php
// Database credentials
$servername = "localhost"; // Or "codd.cs.gsu.edu"
$username = "mmudunuri2";
$password = "mmudunuri2";
$dbname = "mmudunuri2";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to the database.<br>";
}

// Define your SQL query
$sql_query = "SHOW TABLES;"; // Change this query as needed

// Execute the query

// Execute the query
$result = $conn->query($sql_query);

if ($result) {
    // Check if query returned rows
    if ($result->num_rows > 0) {
        echo "<h3>Query Results:</h3>";
        // Display results in a table
        echo "<table border='1'>";
        echo "<tr>";
        // Print column names dynamically
        while ($column = $result->fetch_field()) {
            echo "<th>" . htmlspecialchars($column->name) . "</th>";
        }
        echo "</tr>";
        // Print rows dynamically
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

// Close the connection
$conn->close();
?>
