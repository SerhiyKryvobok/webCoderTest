<?php 

$url = $_SERVER['REQUEST_URI'];
$url_length = strlen($url);

$actual_path = substr($url, strpos($url, '/'), $url_length);

if ($actual_path == "/users") {
    $page_title = "Users";

    $users_data = [];

    include_once('./page-users.php');
} else if ($actual_path == "/depts") {
    $page_title = "Departments";

    $depts_data = [];
    
    $mysqli = new webDB;
    $dbdata = $mysqli->query("SELECT * FROM `depts`")->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($dbdata);
    // echo "</pre>";

    foreach ($dbdata as $el) {
        $depts_data[$el['id']] = $el['name'];
    }

    include_once('./page-depts.php');
} else if ($actual_path == "/depts-add") {
    $page_title = "Departments";

    $depts_data = [];
    $mysqli = new webDB;

    if (!empty($_POST['deptname'])) {
        $deptname = $_POST['deptname'];

        $mysqli->query("INSERT INTO depts (name) VALUES ('" . $deptname . "')");
    }

    if (!empty($_POST['deptid'])) {
        $deptid = $_POST['deptid'];

        console_log($deptid);

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

// else if(preg_match("$/users/[a-z,A-Z,0-9]$", $actual_path)){
//     $actual_route = substr($actual_path, (strrpos($actual_path, '/') + 1), $url_length);
//     $actual_route = str_replace("%20", " ", $actual_route);  
//     $data_arr = [
//         'content_to_show' => $actual_route
//     ];      
//     $page_title = "Route - ".$actual_route;
//     include_once('./users.php');
// }

?>