<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Students</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>🎓 Manage Students</h1>
  <a href="index.php">🏠 Home</a> | 
  <a href="add_student.php">➕ Add Student</a>
  <br><br>

  <?php
  $result = mysqli_query($conn, "SELECT * FROM students");
  ?>

  <table border="1" cellpadding="10">
    <tr><th>ID</th><th>Name</th><th>Course</th><th>Action</th></tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['student_id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['course'] ?></td>
        <td>
          <a href="edit_student.php?id=<?= $row['student_id'] ?>">✏️ Edit</a> | 
          <a href="delete_student.php?id=<?= $row['student_id'] ?>" onclick="return confirm('Delete this student?');">🗑️ Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
