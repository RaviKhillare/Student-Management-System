<?php
// MySQL connection setup
$host = 'localhost';      // Change to your DB host (e.g. 127.0.0.1 or Codespace's DB host)
$username = 'root';       // Change to your DB username
$password = '';           // Change to your DB password
$database = 'student_db'; // Change to your DB name

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    roll VARCHAR(50),
    email VARCHAR(255)
)");

// Handle form submission
if (isset($_POST['add_student'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $roll = $conn->real_escape_string($_POST['roll']);
    $email = $conn->real_escape_string($_POST['email']);

    $conn->query("INSERT INTO students (name, roll, email) VALUES ('$name', '$roll', '$email')");
}

// Fetch students from DB
$result = $conn->query("SELECT * FROM students");
?>

<!-- HTML Form -->
<form method="post">
    Name: <input type="text" name="name" required>
    Roll Number: <input type="text" name="roll" required>
    Email: <input type="email" name="email" required>
    <button type="submit" name="add_student">Add Student</button>
</form>

<!-- Display Student List -->
<table border="1">
    <tr><th>Name</th><th>Roll</th><th>Email</th><th>Actions</th></tr>
    <?php while ($student = $result->fetch_assoc()): ?>
        <tr>
            <td><?=htmlspecialchars($student['name'])?></td>
            <td><?=htmlspecialchars($student['roll'])?></td>
            <td><?=htmlspecialchars($student['email'])?></td>
            <td>
                <!-- Add Edit/Delete logic links here -->
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<?php $conn->close(); ?>