<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<?php
// variables set to empty
$nameErr = $emailErr = $genderErr = $departmentErr = $dobErr = $stateErr = ""; 
$name = $email = $gender = $about = $department = $dob = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["department"])) {
    $departmentErr = "Department is required";
  } else {
    $department = test_input($_POST["department"]);
  }

  if (empty($_POST["about"])) {
    $about = "";
  } else {
    $about = test_input($_POST["about"]);
  }
  if (empty($_POST["date"])) {
    $dobErr = "Date of Birth is required";
  } else {
    $dob = test_input($_POST["date"]);
  }
  if (empty($_POST["state"])) {
    $stateErr = "State of Origin is required";
  } else {
    $state = test_input($_POST["state"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Student Bio-data Form</h2>
<p><span class="error" style="color:red;">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Full Name: <input type="text" name="name" placeholder="Enter full name" value="<?php echo $name;?>">
  <span class="error" style="color:red;">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" placeholder="youremail@mail.com" value="<?php echo $email;?>">
  <span class="error" style="color:red;">* <?php echo $emailErr;?></span>
  <br><br>
  Department: <input type="text" name="department" placeholder="e.g. computer science" value="<?php echo $department;?>">
  <span class="error" style="color:red;"> * <?php echo $departmentErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error" style="color:red;">* <?php echo $genderErr;?></span>
  <br><br>
  Date of birth: <input type="date" name="date" value="<?php echo $dob;?>">
  <span class="error" style="color:red;"> * <?php echo $dobErr;?></span>
  <br><br>
  State of Origin: <input type="text" name="state" placeholder = "e.g. Kogi State" value="<?php echo $state;?>">
  <span class="error" style="color:red;"> * <?php echo $stateErr;?></span>
  <br><br>
  About you: <textarea name="about" rows="6" cols="40" placeholder="Give a brief description about yourself"><?php echo $about;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $department;
echo "<br>";
echo $gender;
echo "<br>";
echo $dob;
echo "<br>";
echo $state;
echo "<br>";
echo $about;
echo "<br>";



?>

</body>
</html>