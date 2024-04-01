<?php
function LimpaString($str){
    $arr = array("select", "from", "where", "drop", "truncate","delete","table");
    return addslashes(strip_tags(str_ireplace($arr,"",$str)));
}