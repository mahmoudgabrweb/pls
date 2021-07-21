<?php

if (!function_exists("generateURL")) {
    function generateURL($prefix, $id, $name)
    {
        $url_string = "$id-" . str_replace(" ", "-", $name);
        return url("$prefix/$url_string");
    }
}

if (!function_exists("decryptSlug")) {
    function decryptSlug($slug)
    {
        $slug_arr = explode("-", $slug);
        return $slug_arr[0];
    }
}
