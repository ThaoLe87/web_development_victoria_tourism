<?php
    require_once('include/config.inc');
    require_once('include/DbController.inc');
    $title = "Modify";

    include('include/header.inc');
    include('include/nav.inc');

    $db = new DbController(HOST, USER, PASS, DB);
    $sql = "select id, name, photo from attractions";
    $results = $db->getRecords($sql);
    ?>
    <table>
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Image</th>
    <th colspan="2">Make Changes</th>
    </tr>
    <?php
    foreach ($results as $row) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td><img class='thumb' src='images/{$row['photo']}' alt='{$row['name']}'></td>";
    echo "<td><a class='link' href='update_form.php?id={$row['id']}'>Update</a></td>";
    echo "<td><a class='link' href='delete_confirm.php?id={$row['id']}'>Delete</a></td>";
    echo "</tr>";
    }
    echo "</table>";

    include('include/footer.inc');
?>
