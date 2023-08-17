<?php 

$url = $_SERVER['REQUEST_URI'];
$url_length = strlen($url);

$actual_path = substr($url, strpos($url, '/'), $url_length);

if ($actual_path == "/users") {
    $page_title = "Users";
    include_once('./users.php');
} else if ($actual_path == "/depts") {
    $page_title = "Departments";
    include_once('./depts.php');
} else {
    $page_title = "Home";
    include_once('./home.php');
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