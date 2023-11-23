<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    
</head>

<body>

<?php
$x = 1;

while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
}

$x = 1;
echo "------------------------------<br>";


do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);

echo "------------------------------<br>";


for ($x = 1; $x <= 5; $x++) {
    echo "The number is: $x <br>";
  }


echo "------------------------------<br>";

for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>";
}

echo "------------------------------<br>";

for ($x = 0; $x < 6; $x++) {
    if ($x == 4) {
      continue;
    }

    echo "The number is: $x <br>";
  }
  echo "------------------------------<br>";
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";

echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>


</body>


</html>