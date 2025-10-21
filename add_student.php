<?php include 'db_connect.php'; ?>

<?php
if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $course = $_POST['course'];
  mysqli_query($conn, "INSERT INTO students (name, course) VALUES ('$name', '$course')");
  header("Location: students.php");
}
?>

<form method="POST">
  <h2>Add Student</h2>
  <label>Name:</label><br>
  <input type="text" name="name" required><br>
  <label>Course:</label><br>
  <input type="text" name="course"><br><br>
  <input type="submit" name="save" value="Save">
</form>
