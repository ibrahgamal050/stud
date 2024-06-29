<?php
// Include database connection code
include_once "config/dbconnect.php";

// Function to fetch page content by title
function getPageContent($title) {
    global $conn;
    $sql = "SELECT content FROM pages WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $stmt->bind_result($content);
    $stmt->fetch();
    $stmt->close();
    return $content;
}

// Define the title of the page you want to display
$pageTitle = "Main Page";

// Get content of the selected page
$pageContent = getPageContent($pageTitle);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    
    <div>
        <?php echo $pageContent; ?>
    </div>
</body>
</html>
