<?php
// Include database connection code
include_once "../config/dbconnect.php";

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

// Function to update page content by title
function updatePageContent($title, $content) {
    global $conn;
    $sql = "UPDATE pages SET content = ? WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $content, $title);
    $stmt->execute();
    $stmt->close();
}

// Check if form is submitted for updating page content
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    updatePageContent($title, $content);
}

// Define page titles
$pageTitles = ["Main Page", "About Author", "About Company"];

// Handle page selection
if (isset($_GET["page"])) {
    $selectedPage = $_GET["page"];
} else {
    // Default to the first page title
    $selectedPage = $pageTitles[0];
}

// Get content of selected page
$pageContent = getPageContent($selectedPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Edit <?php echo $selectedPage; ?></h1>
    </header>

    <div class="container">
        <div class="form-container">
            <form method="post">
                <input type="hidden" name="title" value="<?php echo $selectedPage; ?>">
                <textarea name="content" rows="10" cols="50"><?php echo htmlspecialchars($pageContent); ?></textarea><br>
                <input type="submit" value="Save">
            </form>
        </div>

        <ul class="nav">
            <?php foreach ($pageTitles as $pageTitle): ?>
                <li><a href="?page=<?php echo urlencode($pageTitle); ?>"><?php echo $pageTitle; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>

