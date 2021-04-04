<?php
$name="";
$email="";
$username="";
$password="";
$confirm="";
$date_of_birth="";
$status="";
$address="";
$city="";
$postal_code="";
$home="";
$mobile="";
$card_num="";
$card_expiry="";
$salary="";
$url="";
$gpa="";

$isNameValid=TRUE;
$isEmailValid=TRUE;
$isUsernameValid=TRUE;
$isPasswordValid=TRUE;
$isConfirmValid=TRUE;
$isDateOfBirthValid=TRUE;
$isStatusValid=TRUE;
$isAddressValid=TRUE;
$isCityValid=TRUE;
$isPostalCodeValid=TRUE;
$isHomeValid=TRUE;
$isMobileValid=TRUE;
$isCardNumValid=TRUE;
$isCardExpiryValid=TRUE;
$isSalaryValid=TRUE;
$isURLValid=TRUE;
$isGPAValid=TRUE;


if($_SERVER["REQUEST_METHOD"]=='POST'){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $confirm=$_REQUEST['confirm'];
    $date_of_birth=$_REQUEST['date_of_birth'];
    $status=$_REQUEST['status'];
    $address=$_REQUEST['address'];
    $city=$_REQUEST['city'];
    $postal_code=$_REQUEST['postal_code'];
    $home=$_REQUEST['home'];
    $mobile=$_REQUEST['mobile'];
    $card_num=$_REQUEST['card_num'];
    $card_expiry=$_REQUEST['card_expiry'];
    $salary=$_REQUEST['salary'];
    $url=$_REQUEST['url'];
    $gpa=$_REQUEST['gpa'];

    $isNameValid=preg_match("/^[a-z]+[a-z]+$/i",$name);
    $isEmailValid=preg_match("/[a-z0-9]+@[a-z]+[.][a-z]{2,}/",$email);
    $isUsernameValid=preg_match("/.{5,}/",$username);
    $isPasswordValid=preg_match("/.{8,}/",$password);
    $isConfirmValid=!strcmp($password,$confirm);
    $isDateOfBirthValid=preg_match("/^[0-9]{2}[.][0-9]{2}[.][0-9]{4}$/",$date_of_birth);
    if(strcmp($status,"Married") & strcmp($status,"Single") & strcmp($status,"Divorced") & strcmp($status,"Widowed")){
        $isStatusValid=FALSE;
    }
    if(strlen($address)==0){
        $isAddressValid=FALSE;
    }
    if(strlen($city)==0){
        $isCityValid=FALSE;
    }
    $isPostalCodeValid=preg_match("/[0-9]{6}/",$postal_code);
    $isHomeValid=preg_match("/[0-9]{2}[ ][0-9]{7}/",$home);
    $isMobileValid=preg_match("/[0-9]{2}[ ][0-9]{7}/",$mobile);
    $isCardNumValid=preg_match("/[0-9]{4}[ ][0-9]{4}[ ][0-9]{4}[ ][0-9]{4}/",$card_num);
    $isCardExpiryValid=preg_match("/^[0-9]{2}[.][0-9]{2}[.][0-9]{4}$/",$card_expiry);
    $isSalaryValid=preg_match("/^(UZS)[ ][0-9.,]+/",$salary);
    $isURLValid=preg_match("/^(http:\/\/)[a-z0-9]+[.][a-z]+/",$url);
    $isGPAValid=preg_match("/[1234][.][05]/",$gpa);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="style.css" type="text/css" rel="stylesheet" />
    </head>
	
	<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<div class="container">
        <div class="row">
            <div class="col">
                <h1>Registration Form</h1>
                <a href="regex_valid_form.php">Regex</a>
                <p>
                    This form validates user input and then displays "Thank You" page.
                </p>

                <hr />

                <h2>Please, fill below fields correctly</h2>

                <form action="index.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control <?= $isNameValid?'':'is-invalid' ?>" id="name" value="<?= $name ?>" name="name" placeholder="Enter your name">
                        <div class="invalid-feedback">
                            Name should contain at least 2 characters
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control  <?= $isEmailValid?'':'is-invalid' ?>" value="<?=$email?>" id="email" name="email" placeholder="Enter your email">
                        <div class="invalid-feedback">
                            Wrong email
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= $isUsernameValid?'':'is-invalid' ?>" value="<?=$username?>" id="username" name="username" placeholder="Enter your username">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control <?= $isPasswordValid?'':'is-invalid' ?>" value="<?=$password?>" id="password" name="password" placeholder="Enter your password">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control <?= $isConfirmValid?'':'is-invalid' ?>"  value="<?=$confirm?>" id="confirm" name="confirm" placeholder="Confirm your password">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date Of Birth</label>
                        <input type="text" class="form-control <?= $isDateOfBirthValid?'':'is-invalid' ?>" value="<?=$date_of_birth?>" id="date_of_birth" name="date_of_birth" placeholder="Enter your date of birth">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Marital Status</label>
                        <input type="text" class="form-control <?= $isStatusValid?'':'is-invalid' ?>" value="<?=$status?>" id="status" name="status" placeholder="Enter your marital status">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control <?= $isAddressValid?'':'is-invalid' ?>" value="<?=$address?>" id="address" name="address" placeholder="Enter your address">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control <?= $isCityValid?'':'is-invalid' ?>" value="<?=$city?>" id="city" name="city" placeholder="Enter your city">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" class="form-control <?= $isPostalCodeValid?'':'is-invalid' ?>" value="<?=$postal_code?>" id="postal_code" name="postal_code" placeholder="Enter your postal code">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="home" class="form-label">Home Phone</label>
                        <input type="text" class="form-control <?= $isHomeValid?'':'is-invalid' ?>" value="<?=$home?>" id="home" name="home" placeholder="Enter your home phone number">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Phone</label>
                        <input type="text" class="form-control <?= $isMobileValid?'':'is-invalid' ?>" value="<?=$mobile?>" id="mobile" name="mobile" placeholder="Enter your mobile phone number">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="card_num" class="form-label">Credit Card Number</label>
                        <input type="text" class="form-control <?= $isCardNumValid?'':'is-invalid' ?>" value="<?=$card_num?>" id="card_num" name="card_num" placeholder="Enter your Credit Card number">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="card_expiry" class="form-label">Credit Card Expiry Date</label>
                        <input type="text" class="form-control <?= $isCardExpiryValid?'':'is-invalid' ?>" value="<?=$card_expiry?>" id="card_expiry" name="card_expiry" placeholder="Enter your Credit Card Expiry Date">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Monthly Salary</label>
                        <input type="text" class="form-control <?= $isSalaryValid?'':'is-invalid' ?>" value="<?=$salary?>" id="salary" name="salary" placeholder="Enter your monthly salary">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Address</label>
                        <input type="text" class="form-control <?= $isURLValid?'':'is-invalid' ?>" value="<?=$url?>" id="url" name="url" placeholder="Enter your Web Site URL">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gpa" class="form-label">Overall GPA</label>
                        <input type="text" class="form-control <?= $isGPAValid?'':'is-invalid' ?>" value="<?=$gpa?>" id="gpa" name="gpa" placeholder="Enter your Overall GPA">
                        <div class="invalid-feedback">
                            Wrong
                        </div>
                    </div>
                    <input type="submit" value="Submit">
                </form>


            </div>
        </div>
    </div>
	</body>
</html>