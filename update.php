<?php
    $title = "Update Confirmation";
    include('include/header.inc');
    include('include/nav.inc');
    echo "<div id='message'>";
    $error = false;
    if (!empty($_POST['id'])) {
        require_once('include/config.inc');
        require_once('include/DbController.inc');
        $db = new dbController(HOST, USER, PASS, DB);
        foreach ($_POST as $key => $val) {
        $$key = trim($val);
        }
        $sql = "UPDATE attractions SET name=?, venue=?, topic=?, details=?  WHERE id=?";
        $update = $db->updateRecord($sql, $name, $venue, $topic, $details, $id);
        if ($update) {
            echo "<p>Record $name updated<p>";
        } else {
            $error = true;
        }
    } else {
    $error = true;
    }
    if ($error) {
    echo "<p>Record NOT updated<p>";
    }
    echo "</div>";
    include('include/footer.inc');
?>