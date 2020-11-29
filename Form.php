
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration Form</title>
<style>

.error {color: #F32323;}

* {
 margin: 0;
padding: 0;
}

body{
background-color: #23F3DF;

line-height: 0.8;
height: 100%;
}







* {
  box-sizing: border-box;
}


input[type=text], select, textarea {
  width: 70%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
.container label {
  color: black;
}

input[type=text]:focus {
  background-color: lightblue;
}


input[type=submit] {
  background-color: #3C96CB;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

.container img{
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}



input[type=submit]:hover {
  background-color: darkblue;
}

.container {
  border-radius: 5px;
  background: rgba(173, 216, 230, 0.3) ;
  width: 40%;
  padding: 6px;
  margin-left: 450px;
  
  
}
.container h1{
  margin-top:20px;
  padding: 0px;
  text-align: left;
  color: black;
}





}
</style>
</head>
<body>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $mobErr = "";
$name = $email = $gender = $mobno = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["URL"])) {
    $websiteErr = "URL is required";
  } else {
    $website = test_input($_POST["URL"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["mob"])) {
    $mobErr = "mobile is required";
  } else {
    $mobno = test_input($_POST["mob"]);
     // check if mobile no. syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[0-9]{10}$/ ",$mobno)) {
      $mobErr = "Invalid mobile number.";  
  }
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




<div class="container">
<h1>Registration Form</h1><br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <label>Name:</lable> 
  <br><input type="text" name="fname" id="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail:<br> <input type="text" name="email" id="name" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  URL:<br> <input type="text" name="URL" id="name" value="<?php echo $website;?>">
  <span class="error">* <?php echo $websiteErr;?></span>
  <br><br>
  Mobile no.:<br> <input type="text" name="mob" id="num" value="<?php echo $mobno;?>">
  <span class="error">* <?php echo $mobErr;?></span>
  <br><br>
  Gender:<br><br>
  <input type="radio" name="gender" id="male" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" id="male" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" id="male" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" value="Register" id="sub"> 
</form>
</div>
</div>

</body>
</html>