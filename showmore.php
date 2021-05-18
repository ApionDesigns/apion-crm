<?php
// define variables and set to empty values

if (!isset($_POST['inrcvrtname'])) {
    $list = 10;
} else {
    $list = $list * 2;
    header("location: clientdash");
}
