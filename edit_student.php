<?php include 'db_connect.php'; ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE student_id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $course = $_POST['course'];
  mysqli_query($conn, "UPDATE students SET name='$name', course='$course' WHERE student_id=$id");
  header("Location: students.php");
}
?>

<form method="POST">
  <h2>Edit Student</h2>
  <label>Name:</label><br>
  <input type="text" name="name" value="<?= $row['name'] ?>"><br>
  <label>Course:</label><br>
  <input type="text" name="course" value="<?= $row['course'] ?>"><br><br>
  <input type="submit" name="update" value="Update">
</form>
