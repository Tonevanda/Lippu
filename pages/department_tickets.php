<!DOCTYPE html>

<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');

    $user = getUserDataByID($_SESSION["id"]);
    
    if(isset($_POST["order"]) && isset($_POST["sort"])){
        $tickets = getAllDepartmentTickets($user["department_id"],$_POST["order"], $_POST["sort"]);
    } else {
        $tickets = getAllDepartmentTickets($user["department_id"]);
    }
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <form class="sortTickets" id="sort_tickets_form">
        <label for="order">Order by:</label>
        <select name="order" id="order">
            <option value="id">Most Recent</option>
            <option value="status_id">Status</option>
            <option value="department_id">Department</option>
            <option value="priority">Priority</option>
        </select>

        <label for="sort">Sorting order:</label>
        <select name="sort" id="sort">
            <option value="desc">Descending</option>
            <option value="asc">Ascending</option>
        </select>

        <button type="submit">Sort</button>
    </form>

    <h2 id="active_department_tickets">Your Department's Active Tickets:</h2><br>
    <section id="all_department_active_tickets" class="tickets">
    </section>
    <script src="../scripts/get_tickets.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 