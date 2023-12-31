<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
?>

<header class="page_header">
    Lippu!
</header>
<body>
    <form action="../actions/validate_csrf_action.php">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
    </form>
    <div class="sidebar close">
        <div class="sidebarDetails">
            <i class='bx bxs-notepad'></i>
            <span class="websiteName">Lippu</span>
        </div>
        <ul class="sidebarAllButtons">
            <li>
                <a href="home.php">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="sidebarButtonName">Home</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="home.php">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="sidebarButton">
                    <a href="my_tickets.php">
                        <i class='bx bx-collection' ></i>
                        <span class="sidebarButtonName">My Tickets</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="subMenu">
                    <li><a class="sidebarButtonName" href="my_tickets.php">My Tickets</a></li>
                    <li><a href="user_active_tickets.php">Active Tickets</a></li>
                    <li><a href="../pages/user_closed_tickets.php">Closed Tickets</a></li>
                    <li><a href="user_tickets.php">All Tickets</a></li>
                </ul>
            </li>
            <?php if($_SESSION["type"] !== 'Client'){?>
                <li class = "AgentMenu">
                    <div class="sidebarButton">
                        <a href="agent_menu.php">
                            <i class='bx bxs-user-badge'></i>
                            <span class="sidebarButtonName">Agent Menu</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow' ></i>
                    </div>
                    <ul class="subMenu">
                        <li><a class="sidebarButtonName" href="agent_menu.php">Agent Menu</a></li>
                        <li><a href="agent_assigned_tickets.php">Assigned Tickets</a></li>
                        <li><a href="department_tickets.php">Active Department Tickets</a></li>
                        <li><a href="agent_all_active_tickets.php">All Active Tickets</a></li>
                        <li><a href="../pages/manage_faq.php">Manage FAQ</a></li>

                    </ul>
                </li>
                <?php if($_SESSION["type"] !== 'Agent'){?>
                    <li class="AdminMenu">
                        <div class="sidebarButton">
                            <a href="admin_menu.php">
                                <i class='bx bx-id-card'></i>
                                <span class="sidebarButtonName">Admin Menu</span>
                            </a>
                            <i class='bx bxs-chevron-down arrow' ></i>
                        </div>
                        <ul class="subMenu">
                            <li><a class="sidebarButtonName" href="admin_menu.php">Admin Menu</a></li>
                            <li><a href="manage_users.php">Manage Users</a></li>
                            <li><a href="add_entities.php">Add Entities</a></li>
                        </ul>
                    </li>
            <?php }}?>
            <li>
                <a href="faq.php">
                    <i class='bx bx-question-mark' ></i>
                    <span class="sidebarButtonName">F.A.Q.</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="faq.php">F.A.Q.</a></li>
                </ul>
            </li>
            <li>
                <a href="profile.php">
                    <i class='bx bxs-user'></i>
                    <span class="sidebarButtonName">Profile</span>
                </a>
                <ul class="subMenu">
                    <li><a class="sidebarButtonName" href="profile.php">Profile</a></li>
                    <li><a href="change_profile_info.php">Change Profile Info</a></li>
                </ul>
            </li>
            <li>
                <a href="../utils/end_session.php">
                    <i class='bx bx-log-out'></i>
                    <span class="sidebarButtonName">Log out</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="../utils/end_session.php">Log out</a></li>
                </ul>
            </li>
        </ul>
    </div>
        <div class="hamburguerMenu">
            <i class='bx bx-menu' ></i>
        </div>
    <script src="../scripts/sidebar.js"></script>
</body>
