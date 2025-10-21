<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Performance Tracker</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>📊 Student Rankings (Average Score)</h1>
  <a href="students.php">Manage Students</a> | 
  <a href="grades.php">Manage Grades</a>
  <br><br>

  <?php
  $query = "
  SELECT 
    s.student_id,
    s.name,
    s.course,
    (SELECT AVG(score) FROM grades g WHERE g.student_id = s.student_id) AS avg_score
  FROM students s
  ORDER BY avg_score DESC;
  ";
  $result = mysqli_query($conn, $query);
  ?>

  <table border="1" cellpadding="10">
    <tr>
      <th>Rank</th>
      <th>Name</th>
      <th>Course</th>
      <th>Average Score</th>
    </tr>
    <?php 
    $rank = 1;
    while($row = mysqli_fetch_assoc($result)) { 
    ?>
    <tr>
      <td><?= $rank++ ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['course'] ?></td>
      <td><?= number_format($row['avg_score'], 2) ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
