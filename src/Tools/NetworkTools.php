<?php

namespace Nerd4ever\Common\Tools;

class NetworkTools
{
    const NETWORK_CLASS_BROADCAST = 'broadcast';
    const NETWORK_CLASS_ADDRESS = 'address';
    const NETWORK_CLASS_SPEED = 'speed';

    public static function resolveDomain(string $host): bool
    {
        if (!self::isDomain($host)) return false;
        exec(sprintf("/usr/bin/nslookup %s | /bin/grep Name | /usr/bin/wc -l", $host), $output, $status);
        return is_array($output) && !empty($output) && $output[0] == '1';
    }

    /**
     * @param $mask
     * @return int (CIRD) Classless Inter-Domain Routing
     */
    public static function mask2cidr($mask): int
    {
        $long = ip2long($mask);
        $base = ip2long('255.255.255.255');
        return 32 - log(($long ^ $base) + 1, 2);
    }

    /**
     * @param $cidr (CIRD) Classless Inter-Domain Routing
     * @return string
     */
    public static function cidr2mask($cidr): string
    {
        return long2ip(-1 << (32 - intval($cidr)));
    }

    // convert cidr to netmask
    // e.g. 21 = 255.255.248.0
    public static function cidr2netmask($cidr): string
    {
        $bin = '';
        for ($i = 1; $i <= 32; $i++) {
            $bin .= $cidr >= $i ? '1' : '0';
        }
        $netmask = long2ip(bindec($bin));

        if ($netmask == "0.0.0.0") return false;
        return $netmask;
    }

    // get network address from cidr subnet
    // e.g. 10.0.2.56/21 = 10.0.0.0
    public static function cidr2network($ip, $cidr)
    {
        return long2ip((ip2long($ip)) & ((-1 << (32 - (int)$cidr))));
    }

    // convert netmask to cidr
    // e.g. 255.255.255.128 = 25
    public static function netmask2cidr($netmask): int
    {
        $bits = 0;
        $netmask = explode(".", $netmask);
        foreach ($netmask as $o) {
            $bits += strlen(str_replace("0", "", decbin($o)));
        }
        return $bits;
    }

    // is ip in subnet
    // e.g. is 10.5.21.30 in 10.5.16.0/20 == true
    //      is 192.168.50.2 in 192.168.30.0/23 == false
    public static function cidrMatch($ip, $network, $cidr): bool
    {
        return (ip2long($ip) & ~((1 << (32 - $cidr)) - 1)) == ip2long($network);
    }

    public static function cidr2Broadcast($network, $cidr)
    {
        return long2ip(ip2long($network) + pow(2, (32 - $cidr)) - 1);
    }

    /**
     * @param $domain
     * @return bool
     */
    public static function domainIsValid($domain): bool
    {
        $regexp = '/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/';
        if (false === preg_match($regexp, $domain)) return false;
        if (!substr_count($domain, '.')) return false;
        if (self::emailIsValid($domain)) return false;
        if (filter_var($domain, FILTER_VALIDATE_IP)) return false;
        return self::isDomain($domain);
    }

    public static function isDomain($domain): bool
    {
        return filter_var(gethostbyname($domain), FILTER_VALIDATE_IP);
    }

    public static function isPort($port): bool
    {
        return !((!is_numeric($port) || intval($port) < 1 || intval($port) > 65535));
    }

    public static function isIp($address): bool
    {
        return boolval(filter_var($address, FILTER_VALIDATE_IP));
    }

    public static function isInterfaceAddress($address): bool
    {
        return preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\/[\d]{1,2}$/', $address);
    }


    public static function emailIsValid($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function networkValidate(string $address): ?string
    {
        $parts = explode('/', $address, 2);
        if (count($parts) != 2) return null;
        $cidr = intVal($parts[1]);
        if ($cidr < 0 || $cidr > 32) return null;
        $blocks = explode('.', $parts[0], 4);
        if (count($blocks) != 4) return null;
        $tmp = [];
        foreach ($blocks as $b) {
            $r = intVal($b);
            if ($r < 0 || $r > 255) return null;
            $tmp[] = $r;
        }
        return join('.', $tmp) . '/' . $cidr;
    }
}