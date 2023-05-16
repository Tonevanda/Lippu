<!DOCTYPE html>

<?php
    include_once('../utils/kick_from_page_admin.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
    include_once('../database/hashtags.php');
    include_once('../database/department.php');
    include_once('../database/status.php');


    $departments = getAllDepartments();
    $hashtags = getAllHashtags();
    $status = getStatus();

?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <section id="add_entities_sec">
        <div class="manage_entities">
            <form action="../actions/add_new_department_action.php" method="post" id="new_department_form">
                <input type=text id="new_department" name="new_department" placeholder="Insert a new department here" required></input>
                <button type="submit">Insert new department</button>
            </form>
            <div id="delete_departments">
                <select id="delete_departments_select">
                    <?php
                        foreach($departments as $department){
                            if($department["name"]==="--") continue;
                            echo '<option value="' . $department["id"] . '">' . $department["name"] . '</option>';
                        }
                    ?>
                </select>
                <button onclick="deleteDepartment(document.querySelector('#delete_departments_select').value)">Delete</button>
            </div>
        </div>
    
        <div class = "manage_entities">
            <form action="../actions/add_new_hashtag_action.php" method="post" id="new_hashtag_form">
                <input type=hashtag id="new_hashtag" name="new_hashtag" placeholder="Insert a new hashtag here" required></input>
                <button type="submit">Insert new hashtag</button>
            </form>
            <div id="delete_hashtag">
                <select id="delete_hashtag_select">
                    <?php
                        foreach($hashtags as $hashtag){
                            echo '<option value="' . $hashtag["id"] . '">' . $hashtag["name"] . '</option>';
                        }
                    ?>
                </select>
                <button onclick="deleteHashtag(document.querySelector('#delete_hashtag_select').value)">Delete</button>
            </div>
        </div>

        <div class = "manage_entities">
            <form action="../actions/add_new_status_action.php" method="post" id="new_status_form">
                <input type=text id="new_status" name="new_status" placeholder="Insert a new status here" required></input>
                <button type="submit">Insert new status</button>
            </form>
            <div id="delete_status">
                <select id="delete_status_select">
                    <?php
                        foreach($status as $singleStatus){
                            if($singleStatus["id"] <= 3) continue;
                            echo '<option value="' . $singleStatus["id"] . '">' .$singleStatus["name"] . '</option>';
                        }
                    ?>
                </select>
                <button onclick="deleteStatus(document.querySelector('#delete_status_select').value)">Delete</button>
            </div>
        </div>
    </section>
    
    <script src="../scripts/add_entities.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>
