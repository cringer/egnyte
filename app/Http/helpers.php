<?php

function get_hostname()
{
	// get hostname of machine
    $hostname = strtolower(gethostbyaddr($_SERVER['REMOTE_ADDR']));

    // if fqdn we need to get the length
    $length = strpos($hostname, ".");
    
    if ($length) {
        $hostname = substr($hostname, 0, $length);
    }

    return $hostname;
}
