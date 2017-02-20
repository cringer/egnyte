<?php

function fetchHostByAddr($ip = null)
{
    if ($ip) {
        $remoteAddr = $ip;
    } else {
        // Get FQDN from IP
        $remoteAddr = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    }

    // Get hostname from FQDN
    if (is_string($remoteAddr)) {
        if (preg_match('/(\w+)\.\w+\.\w+/i', $remoteAddr, $matches)) {
            return $matches[1];
        }
        else {
            return $remoteAddr;
        }
    }
    elseif (is_array($remoteAddr)) {
        foreach ($remoteAddr as $addr) {
            if (preg_match('/(\w+)\.\w+\.\w+/i', $addr, $matches)) {
                return $matches[1];
            }
        }
    }
}

function generateSlug($item)
{
    if (is_array($item)) {
        $slugs = array_map(function ($items) {
            return strtolower(str_replace(' ', '-', $items));             
        }, $item);

        return $slugs;     
    }
    elseif (is_string($item)) {
        return strtolower(str_replace(' ', '-', $item));
    }
}
