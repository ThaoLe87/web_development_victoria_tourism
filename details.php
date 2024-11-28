<?php
    require_once( 'include/config.inc' );
    require_once( 'include/DbController.inc' );
    include('include/header.inc');
	include('include/nav.inc');
    
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $db = new DbController(HOST, USER, PASS, DB);
        $sql = "select id, name, venue, topic, details, photo from attractions where id=$id";
        $records = $db->getRecords($sql);
        // var_dump($records);

        echo "<div class='container'>";

        foreach ($records as $row) {
            echo "<section class='imgphoto-detail'>";
            echo "<h2> {$row['name']} </h2>";
            echo "<h3> {$row['venue']} </h3>";
            echo "<h3> {$row['topic']} </h3>";
            echo "<img src='images/{$row['photo']}' alt=' {$row['photo']} '>";
            echo "<p>{$row['details']}</p>";
            echo "</section>\n";
        }
        echo "</div>\n";
    }
        
    include('include/footer.inc');
?>