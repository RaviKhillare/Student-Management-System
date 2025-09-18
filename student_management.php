<?php
// Initialize the student array (in-memory)
$students = [];

// Add logic to handle form submission
if (isset($_POST['add_student'])) {
    $students[] = [
        'name' => $_POST['name'],
        'roll' => $_POST['roll'],
        'email' => $_POST['email']
    ];
}
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
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?=htmlspecialchars($student['name'])?></td>
            <td><?=htmlspecialchars($student['roll'])?></td>
            <td><?=htmlspecialchars($student['email'])?></td>
            <td>
                <!-- Add Edit/Delete logic links here -->
            </td>
        </tr>
    <?php endforeach; ?>
</table>
