<?php
    $title = "Delete Confirmation";
    include('include/header.inc');
    include('include/nav.inc');
    
    if (!empty($_GET['id'])) {
    require_once('include/config.inc');
    require_once('include/DbController.inc');

    $id = $_GET['id'];
    $db = new DbController(HOST, USER, PASS, DB);
    $sql = "select * from attractions where id = $id";
    $results = $db->getRecords($sql);

    echo "<div class='container'>";
    foreach ($results as $row) {
    
    echo "<section class='imgphoto-detail'>";
    echo "<h2>Are you sure you want to delete this record?</h2>";
    echo "<h3>{$row['name']}</h3>";
    echo "<p>{$row['details']}</p>";
    echo "<img src='images/{$row['photo']}' alt='name' class='thumb'>";
    echo "<p class='confirm'>";
    echo "<a href='modify_table.php'>Cancel</a>";
    echo "&nbsp;";
    // encode url to make html valid
    $imagename = urlencode("images/{$row['photo']}");
    echo "<a href='delete.php?id={$row['id']}&photo=$imagename'>Delete</a>";
    echo "</p>";
    echo "</section>";
    
    }
    echo "</div>";
}
include('include/footer.inc');

?>