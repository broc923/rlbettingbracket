<?php

/**
 * AntiAdBlock custom library for API, with some caching.
 * Requires PHP 5+.
 */
class __AntiAdBlock
{
    /** @var string */
    private $token = '83cb0fc2583ee03d70c1484eed4a440eb894aa0a';

    /** @var int */
    private $zoneId = '911062';

    ///// do not change anything below this point /////

    private function getCurl($url)
    {
        if ((!extension_loaded('curl')) || (!function_exists('curl_version'))) {
            return false;
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT      => 'AntiAdBlock API Client',
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_SSL_VERIFYPEER => true,
        ));

        // prefer SSL if at all possible
        $version = curl_version();
        if ($version['features'] & CURL_VERSION_SSL) {
            curl_setopt($curl, CURLOPT_URL, 'https://go.transferzenad.com' . $url);
        } else {
            curl_setopt($curl, CURLOPT_URL, 'http://go.transferzenad.com' . $url);
        }

        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    private function getFileGetContents($url)
    {
        if (!function_exists('file_get_contents') || !ini_get('allow_url_fopen') ||
            ((function_exists('stream_get_wrappers')) && (!in_array('http', stream_get_wrappers())))) {
            return false;
        }

        if (function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) {
            return file_get_contents('https://go.transferzenad.com' . $url);
        } else {
            return file_get_contents('http://go.transferzenad.com' . $url);
        }
    }

    private function getFsockopen($url)
    {
        $fp = null;
        if (function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) {
            $fp = fsockopen('ssl://' . 'go.transferzenad.com', 443, $enum, $estr, 10);
        }
        if ((!$fp) && (!($fp = fsockopen('tcp://' . gethostbyname('go.transferzenad.com'), 80, $enum, $estr, 10)))) {
            return false;
        }

        $out = "GET " . $url . " HTTP/1.1\r\n";
        $out .= "Host: go.transferzenad.com\r\n";
        $out .= "User-Agent: AntiAdBlock API Client\r\n";
        $out .= "Connection: close\r\n\r\n";
        fwrite($fp, $out);
        $in = '';
        while (!feof($fp)) {
            $in .= fgets($fp, 1024);
        }
        fclose($fp);
        return substr($in, strpos($in, "\r\n\r\n") + 4);
    }

    private function findTmpDir()
    {
        if (!function_exists('sys_get_temp_dir')) {
            if (!empty($_ENV['TMP'])) {
                return realpath($_ENV['TMP']);
            }
            if (!empty($_ENV['TMPDIR'])) {
                return realpath($_ENV['TMPDIR']);
            }
            if (!empty($_ENV['TEMP'])) {
                return realpath($_ENV['TEMP']);
            }
            // this will try to create file in dirname(__FILE__) and should fall back to /tmp or wherever
            $tempfile = tempnam(dirname(__FILE__), '');
            if (file_exists($tempfile)) {
                unlink($tempfile);
                return realpath(dirname($tempfile));
            }
            return null;
        }
        return sys_get_temp_dir();
    }

    public function get()
    {
        $e = error_reporting(0);

        $url = "/v1/getTag?" . http_build_query(array('token' => $this->token, 'zoneId' => $this->zoneId));
        $file = $this->findTmpDir() . '/pa-code-' . md5($url) . '.js';
        // expires in 4h
        if (file_exists($file) && (time() - filemtime($file) < 4 * 3600)) {
            error_reporting($e);
            return file_get_contents($file);
        }
        $code = $this->getCurl($url);
        if (!$code) {
            $code = $this->getFileGetContents($url);
        }
        if (!$code) {
            $code = $this->getFsockopen($url);
        }

        if ($code) {
            // atomic update, and it should be okay if this happens simultaneously
            $fp = fopen("{$file}.tmp", 'wt');
            fwrite($fp, $code);
            fclose($fp);
            rename("${file}.tmp", $file);
        }

        error_reporting($e);
        return $code;
    }
}

$__aab = new __AntiAdBlock();
return $__aab->get();

?>