<!DOCTYPE html>
<html lang="en">
<?php
    include_once('../utils/kick_from_page_admin.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>
<body id = "home_body">
    <?php include_once('../templates/default.php'); ?>
    <ul class="choice-menu">
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="add_entities.php">Add Entities</a></li>
    </ul>
    <script src="../scripts/menu.js"></script>
</body>
</html>