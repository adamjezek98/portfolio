<?php

/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 11.04.2017
 * Time: 23:02
 */
class Error404Controller extends Controller
{
    public function process($params)
    {
        // Hlavička požadavku
        header("HTTP/1.0 404 Not Found");
        // Hlavička stránky
        $this->header['title'] = 'Chyba 404';
        // Nastavení šablony
        $this->view = 'error404';

}
}

