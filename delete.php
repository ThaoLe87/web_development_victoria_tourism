<?php
    $title = "Delete Record";
    include('include/header.inc');
    include('include/nav.inc');
    $error = false;
    if (!empty($_GET['id']) && !empty($_GET['photo'])) {
    $id = $_GET['id'];
    $photo = $_GET['photo'];

    require_once('include/config.inc');
    require_once('include/DbController.inc');

    $db = new DbController(HOST, USER, PASS, DB);
    $sql = "delete from attractions where id = ?";

    if ($db->deleteRecord($sql, $id)) {
    echo "<p>Record deleted</p>";
    if (file_exists($photo)) {
    unlink($photo);
    }
    } else {
    $error = true;
    }
    } else {
    $error = true;
    }
    if ($error) {
    echo "<p>Record NOT deleted<p>";
    }
    include('include/footer.inc');

?>