<?php

//function to render a form
function make_form($email, $username, $birthdate, $address_street, $address_city)

{
    echo '<h2>Please fill in the following details:</h2>';
    echo '<form action="index.php" method="post" name="formUser">';

    echo '<label for="email">Email address: </label><br>';
    echo '<input type="email" id="email" name="email" required value="' . $email . '">';
    echo '<br/><br/>';

    echo '<label for="username">Username (6-10 characters; alphanumeric only) : </label><br>';
    echo '<input type="text" id="username" name="username" required value="' . $username . '">';
    echo '<br/><br/>';

    echo '<label for="password">Password (at least one lowercase letter, one uppercase letter, and one number): </label><br>';
    echo '<input type="text" id="password" name="password" required>';
    echo '<br><br>';

    echo '<label for="birthdate">Date of Birth: </label><br>';
    echo '<input type="date" id="birthdate" name="birthdate" required value="' . $birthdate . '">';
    echo '<br><br>';

    echo '<label for="gender">Gender: </label><br>';
    echo '<input type="radio" id="male" name="gender" value="male" required>';
    echo '<label for="male">Male</label>';
    echo '<input type="radio" id="female" name="gender" value="female">';
    echo '<label for="female">Female</label>';
    echo '<input type="radio" id="other" name="gender" value="other">';
    echo '<label for="other">Other</label>';
    echo '<br><br>';

    echo '<label for="address">Enter Your Address: </label><br>';
    echo '<input type="text" id="addressStreet" name="address_street" placeholder="Street address" required value="' . $address_street . '"><br>';
    echo '<input type="text" id="addressCity" name="address_city" placeholder="City" required value="' . $address_city . '">';
    echo '<br><br>';

    echo '<button type="submit">Submit</button>';
    echo '</form>';


}

//Declare variables
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$address_street = $_POST['address_street'];
$address_city = $_POST['address_city'];

//Test username requirement - change to false if fails
$usernameAlphanumeric = true;
for ($i = 0; $i < strlen($username); $i++){

    if (ord($username[$i]) < ord('a') or ord($username[$i]) > ord('z')){
        $usernameAlphanumeric = false;
    }
}

//Test password requirement - change to false if fails
$passwordRequirmentLowerCase = false;
$passwordRequirmentUpperCase = false;
$passwordRequirmentNumber = false;

for ($i = 0;$i < strlen($password); $i++) {
    if (ord($password[$i])>= ord('a') and ord($password[$i]) <=ord('z')) {
        $passwordRequirmentLowerCase = true;
    }

    if (ord($password[$i]) >= ord('A') and ord($password[$i]) <= ord('Z')) {
        $passwordRequirmentUpperCase = true;
    }

    if (ord($password[$i] >= ord('0') and ord($password[$i]) <= ord('9'))) {
        $passwordRequirmentNumber = true;
    }
}

//Test if error message should be shown or if input is accepted
if (strlen($email) < 4) {
    echo '<p>Email is too short!</p>';
    make_form($email, $username, $birthdate, $address_street, $address_city);

}else if ((strlen($username) < 6) or (strlen($username) > 10) or ($usernameAlphanumeric == false)) {
    echo '<p>Username does not consist of 6-10 characters; alphanumeric only </p>';
    make_form($email, $username,  $birthdate, $address_street, $address_city);

}else if ($passwordRequirmentLowerCase === false or $passwordRequirmentUpperCase === false or $passwordRequirmentNumber === false){
    echo '<p>Password does not consist of at least one lowercase letter, one uppercase letter, and one number) </p>';
    make_form($email, $username,  $birthdate, $address_street, $address_city);

}else if (date('Y' , strtotime($birthdate)) < 1900 or date('Y' , strtotime($birthdate)) > 2020) {
    echo '<p>Invalid date of birth entered, please check the year </p>';
    make_form($email, $username,  $birthdate, $address_street, $address_city);

}else if ($gender === null){
    echo '<p>Please enter your Gender</p>';
    make_form($email, $username,  $birthdate, $address_street, $address_city);

}else if (strlen($address_street) < 2 or strlen($address_city) < 2) {
    echo '<p>Please full Address</p>';
    make_form($email, $username,  $birthdate, $address_street, $address_city);

} else {
    echo '<h1>Thank you for submitting your information.</h1>';
}
