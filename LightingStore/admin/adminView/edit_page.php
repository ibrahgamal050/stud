<?php
// Include the database connection file
include_once "../config/dbconnect.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the page title and HTML content from the form submission
    $pageTitle = $_POST['page_title'];
    $htmlContent = $_POST['html_content'];

    // Update the HTML content of the selected page in the database
    $sql = "UPDATE pages SET content = ? WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $htmlContent, $pageTitle);
    $stmt->execute();
    $stmt->close();

    // Display a confirmation message
    echo "Changes saved successfully!";
}
?>
