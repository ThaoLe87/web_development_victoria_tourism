<?php
	include('include/header.inc');
	include('include/nav.inc');
    include('include/config.inc');
    include('include/DbController.inc');

//Form validation (empty fields), leave 1 text and don't browse for an image.
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if(empty($name)) {
    exit("Please enter name");
}

if (isset($_FILES['photo']['name'])) {
    $photo = $_FILES['photo']['name'];
}

if(empty($_FILES['photo']['name'])) {
    exit("Please choose a photo");
}

$db = new DbController(HOST, USER, PASS, DB);
foreach ($_POST as $key => $val) {
    $$key = $db->cleanUp($val);
}

$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];
$error = $_FILES['photo']['error'];

$sql = "INSERT INTO attractions(name, venue, topic, details, photo)
VALUES (?,?,?,?,?)";
if ($db-> insertQuery($sql, $name, $venue, $topic, $details, $photo)) {
    echo '<p>New record successfully inserted into the database</p>';
    $db->uploadImage($temp, 'images/'.$photo);
    echo "<img style='max-width: 500px; max-height: 500px; width: auto; height: auto;' alt= 'photo' src='images/".$photo."' />";

} else {
    echo '<p>Record not inserted into the database</p>';
}


//move_uploaded_file($_FILES['photo']['tmp_name'],
//"images/" . $_FILES['photo']['name']);
//echo "<img style='max-width: 500px; max-height: 500px; width: auto; height: auto;' src='images/".$photo."' />";


//echo "New attraction added successfully.<br>";
//echo "Name: $name<br>";
//echo "Venue: $venue<br>";
//echo "Topic: $topic<br>";
//echo "Details: $details<br>";
//echo "Image: $photo<br>";
//echo "Temporary Storage: $temp<br>";


	include('include/footer.inc');
?>