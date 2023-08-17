<?php 

$url = $_SERVER['REQUEST_URI'];
$url_length = strlen($url);

$actual_path = substr($url, strpos($url, '/'), $url_length);

if ($actual_path == "/users") {
    $page_title = "Users";

    $users_data = [];

    $mysqli = new webDB;
    $dbdata = $mysqli->query("SELECT * FROM `users`")->fetch_all(MYSQLI_ASSOC);

    foreach ($dbdata as $el) {
        $deptname = $mysqli->query("SELECT name FROM `depts` WHERE id = " . $el['dep'] . "")->fetch_array(MYSQLI_ASSOC);

        $el['dep'] = $deptname['name'];

        array_push($users_data, $el);
    }

    include_once('./page-users.php');
} else if ($actual_path == "/add-users") {
    $page_title = "Add new user";

    $depts_data = [];
    
    $mysqli = new webDB;
    $dbdata = $mysqli->query("SELECT * FROM `depts`")->fetch_all(MYSQLI_ASSOC);

    foreach ($dbdata as $el) {
        $depts_data[$el['id']] = $el['name'];
    }

    include_once('./page-adduser.php');
} else if ($actual_path == "/add-user-new") {
    $page_title = "Add new user";

    $user_data = [];

    $mysqli = new webDB;

    if (!empty($_POST)) {
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $useraddress = $_POST['useraddress'];
        $usertel = $_POST['usertel'];
        $usernotes = $_POST['usernotes'];
        $userdept = $_POST['userdept'];

        $sql = "INSERT INTO users(name, email, adress, tel, notes, dep) VALUES ('$username', '$useremail', '$useraddress', '$usertel', '$usernotes', '$userdept' )";

        $mysqli->query($sql);
    }
    
    $dbdata = $mysqli->query("SELECT * FROM `users`")->fetch_all(MYSQLI_ASSOC);

    foreach ($dbdata as $el) {
        $deptname = $mysqli->query("SELECT name FROM `depts` WHERE id = " . $el['dep'] . "")->fetch_array(MYSQLI_ASSOC);
        $el['dep'] = $deptname;
        array_push($users_data, $el);
    }

    include_once('./page-users.php');
} else if ($actual_path == "/depts") {
    $page_title = "Departments";

    $depts_data = [];
    
    $mysqli = new webDB;
    $dbdata = $mysqli->query("SELECT * FROM `depts`")->fetch_all(MYSQLI_ASSOC);

    foreach ($dbdata as $el) {
        $depts_data[$el['id']] = $el['name'];
    }

    include_once('./page-depts.php');
} else if ($actual_path == "/add-dept") {
    $page_title = "Departments";

    $depts_data = [];
    $mysqli = new webDB;

    if (!empty($_POST['deptname'])) {
        $deptname = $_POST['deptname'];

        $mysqli->query("INSERT INTO depts (name) VALUES ('" . $deptname . "')");
    }

    if (!empty($_POST['deptid'])) {
        $deptid = $_POST['deptid'];

        $mysqli->query("DELETE FROM depts WHERE id = ". $deptid . "");
    }
    
    $dbdata = $mysqli->query("SELECT * FROM `depts`")->fetch_all(MYSQLI_ASSOC);

    foreach ($dbdata as $el) {
        $depts_data[$el['id']] = $el['name'];
    }

    include_once('./page-depts.php');
} else {
    $page_title = "Home";
    include_once('./page-home.php');
}    

?>