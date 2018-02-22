

<?php
function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'),range('A','Z'));

    $key = "";
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

echo RandomString(10);
?>
