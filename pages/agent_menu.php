<!DOCTYPE html>
<html lang="en">
<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>
<body id = "home_body">
    <?php include_once('../templates/default.php'); ?>
    <ul class="choice-menu">
        <li><a href="agent_assigned_tickets.php">Assigned Tickets</a></li>
        <li><a href="department_tickets.php">Active Department Tickets</a></li>
        <li><a href="agent_all_active_tickets.php">All Active Tickets</a></li>
        <li><a href="manage_faq.php">Manage FAQ</a></li>
    </ul>
    <script src="../scripts/menu.js"></script>
</body>
</html>