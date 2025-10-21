<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Grades</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>📘 Manage Grades</h1>
  <a href="index.php">🏠 Home</a> | 
  <a href="add_grade.php">➕ Add Grade</a>
  <br><br>

  <?php
  $query = "
  SELECT g.grade_id, s.name, g.subject, g.score
  FROM grades g
  JOIN students s ON s.student_id = g.student_id
  ORDER BY s.name;
  ";
  $result = mysqli_query($conn, $query);
  ?>

  <table border="1" cellpadding="10">
    <tr><th>ID</th><th>Student</th><th>Subject</th><th>Score</th><th>Action</th></tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['grade_id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['subject'] ?></td>
        <td><?= $row['score'] ?></td>
        <td>
          <a href="edit_grade.php?id=<?= $row['grade_id'] ?>">✏️ Edit</a> | 
          <a href="delete_grade.php?id=<?= $row['grade_id'] ?>" onclick="return confirm('Delete this grade?');">🗑️ Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
