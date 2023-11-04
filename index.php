<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  SName: <input type="text" name="sfname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['fname'];
  $sname = $_POST['sfname'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
    echo '<br>';
    echo $sname;

  }
}
?>

</body>
</html>