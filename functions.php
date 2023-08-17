<?php

    function console_log($data) {
        $temp = json_encode($data);
        echo '<script>console.log(' . $temp . ');</script>';
    }

?>