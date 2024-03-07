<?php
include "../../../config.php";


function generate_slug($string, $wordLimit = 0)
{
    $separator = '-';

    if ($wordLimit != 0) {
        $wordArr = explode(' ', $string);
        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
    }

    $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;'                 => '',
        '[^\w\d _-]'            => '',
        '\s+'                   => $separator,
        '(' . $quoteSeparator . ')+' => $separator
    );

    $string = strip_tags($string);
    foreach ($trans as $key => $val) {
        $string = preg_replace('#' . $key . '#iu', $val, $string);
    }

    $string = strtolower($string);

    return trim(trim($string, $separator));
}
$result['success'] = false;
$result['slug'] = "";

if (isset($_POST['post_title'])) {
    $result['success'] = true;
    $result['slug'] = generate_slug($_POST['post_title']);
}

die(json_encode($result));
