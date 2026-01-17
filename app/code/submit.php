<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$website = $_POST['website'] ?? '';
$comment = $_POST['comment'] ?? '';
$gender  = $_POST['gender'] ?? '';

$servername = "db";
$username   = "root";
$password   = "root";
$dbname     = "FCT";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (name, email, website, comment, gender)
        VALUES ('$name', '$email', '$website', '$comment', '$gender')";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form Submission Result</title>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.result-box {
    background: #fff;
    width: 420px;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0,0,0,0.25);
}

.result-box h2 {
    text-align: center;
    color: #2ecc71;
    margin-bottom: 20px;
}

.result-box h3 {
    color: #333;
}

.result-box ul {
    list-style: none;
    padding: 0;
}

.result-box ul li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.result-box ul li strong {
    color: #555;
}

.error {
    color: red;
    text-align: center;
}

.back-btn {
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    background: #667eea;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
}

.back-btn:hover {
    background: #764ba2;
}
</style>
</head>

<body>

<div class="result-box">
<?php
if (mysqli_query($conn, $sql)) {
    echo "<h2>✔ Data Saved Successfully</h2>";
    echo "<h3>Submitted Information</h3>";
    echo "<ul>";
    echo "<li><strong>Name:</strong> " . htmlspecialchars($name) . "</li>";
    echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
    echo "<li><strong>Website:</strong> " . htmlspecialchars($website) . "</li>";
    echo "<li><strong>Comment:</strong> " . htmlspecialchars($comment) . "</li>";
    echo "<li><strong>Gender:</strong> " . htmlspecialchars($gender) . "</li>";
    echo "</ul>";
} else {
    echo "<h3 class='error'>Error Occurred</h3>";
    echo "<p class='error'>" . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>
<a href="index.html" class="back-btn">⬅ Back to Form</a>
</div>

</body>
</html>
