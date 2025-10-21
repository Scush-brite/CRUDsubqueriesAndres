<?php include 'db_connect.php'; ?>

<?php
if (isset($_POST['save'])) {
  $student_id = $_POST['student_id'];
  $subject = $_POST['subject'];
  $score = $_POST['score'];
  mysqli_query($conn, "INSERT INTO grades (student_id, subject, score) VALUES ('$student_id', '$subject', '$score')");
  header("Location: grades.php");
}
?>

<form method="POST">
  <h2>Add Grade</h2>
  <label>Student:</label><br>
  <select name="student_id" required>
    <option value="">Select Student</option>
    <?php
    $students = mysqli_query($conn, "SELECT * FROM students");
    while ($s = mysqli_fetch_assoc($students)) {
      echo "<option value='{$s['student_id']}'>{$s['name']}</option>";
    }
    ?>
  </select><br>
  <label>Subject:</label><br>
  <input type="text" name="subject"><br>
  <label>Score:</label><br>
  <input type="number" step="0.01" name="score"><br><br>
  <input type="submit" name="save" value="Save">
</form>
