<?php
    require_once( 'include/config.inc' );
    require_once( 'include/DbController.inc' );
    include('include/header.inc');
	include('include/nav.inc');
    
    $db = new DbController(HOST, USER, PASS, DB);
    $sql = "select id, name, photo, details from attractions";
    $records = $db->getRecords($sql);
    //var_dump($records);

    echo "<div class='container'>";
    foreach ($records as $row) {
        $name = $row['name'];
        $photo = $row['photo'];
        $details = $row['details'];


        
        echo "<section class='imgphoto'>";
        echo "<img src='images/{$row['photo']}' alt='photo'>";
        echo "<h2> {$row['name']} </h2>";
        //echo "<p> {$row['details']} </p> ";
        echo "<p><a href='details.php?id={$row['id']}'>Read More</a></p>";
        echo "</section>\n";
        
}
    echo "</div>\n";
        
    include('include/footer.inc');
?>