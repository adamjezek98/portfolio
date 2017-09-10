<?php
/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 11.04.2017
 * Time: 22:08
 */
mb_internal_encoding("UTF-8");

//vypnuti chyb na produkci
error_reporting(0);

function autoloadFunkce($trida)
{

    if (preg_match('/Controller/', $trida)) {

        require("controllers/" . $trida . ".php");
    }
    else {

        require("models/" . $trida . ".php");

    }
}

// Registrace callbacku (Pod starým PHP 5.2 je nutné nahradit fcí __autoload())
spl_autoload_register("autoloadFunkce");

//cache-control
Header("Cache-Control: must-revalidate");
$offset = 60 * 60 * 24 * 7;
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
Header($ExpStr);

$forwarder = new ForwarderController();
$forwarder->process(array($_SERVER['REQUEST_URI']));

$forwarder->printView();

