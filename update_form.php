<?php
    $title = "Update Form";
    include('include/header.inc');
    include('include/nav.inc');

    if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once('include/config.inc');
    require_once('include/DbController.inc');

    $db = new dbController(HOST, USER, PASS, DB);
    $sql = "select * from attractions where id = $id";
    $result = $db->getRecords($sql);
    foreach ($result as $row) {
    ?>
    <form class="contactus" method="post" action="update.php">
    <h2>Update attraction details: <?php echo $row['name'] ?> </h2>
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <input type="hidden" name="name" value="<?php echo $row['name'] ?>">
    <label>Venue</label>
    <input type="text" name="venue" value="<?php echo $row['venue'] ?>">
    <label>Topic</label>
    <input type="text" name="topic" value="<?php echo $row['topic'] ?>">
    <label>Description</label>
    <textarea cols="50" rows="5" name="details"><?php echo $row['details'] ?></textarea>
    <input type="submit" name="submit" value="Update">
    </form>
    <?php
    }
}
    include('include/footer.inc');
?>