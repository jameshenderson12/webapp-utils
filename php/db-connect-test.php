<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>PHP/MySQL Database Connection Test</title>
    <meta>
    <meta>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="m-2">
  <h1>PHP/MySQL Database Connection Test</h1>
  <p class="lead">Developed by James Henderson (10/08/2017)</p>

  <?php
  # Code for running via CLI
  # $ php -f db-connect-test.php

  # Enter your DB credentials here
  $dbname = '';
  $dbuser = '';
  $dbpass = '';
  $dbhost = '';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
  mysqli_select_db($conn, $dbname) or die("Could not open the db '$dbname'");

  $test_query = "SHOW TABLES FROM $dbname";
  $result = mysqli_query($conn, $test_query);

  if ($result) {
    echo "<table class='table table-striped table-sm w-50'>";
    $tblCnt = 0;
    while($tbl = mysqli_fetch_array($result)) {
      $tblCnt++;
      echo "<tr><td>$tblCnt</td><td>$tbl[0]</td></tr>";
    }
    echo "</table>";

    if (!$tblCnt) {
      echo "<br>No tables exist in the <strong>$dbname</strong> database.<br>\n";
    } else {
      echo "<br>There are currently $tblCnt tables in the <strong>$dbname</strong> database.<br>\n";
    }
  }
  else {
    echo "Sorry, the <strong>$dbname</strong> database could not be found.";
  }
  ?>

</body>
</html>
