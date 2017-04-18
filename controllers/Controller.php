<?php
/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 11.04.2017
 * Time: 22:19
 */


// Výchozí kontroler pro DevbookMVC
abstract class Controller
{

    // Pole, jehož indexy jsou poté viditelné v šabloně jako běžné proměnné
    protected $data = array();
    // Název šablony bez přípony
    protected $view = "";
    // Hlavička HTML stránky
    protected $header = array('title' => '');

    protected  $lang = "cs";

    protected $content = "";

    protected $labels = "";

    // Vyrenderuje pohled
    public function printView()
    {
       // print("view ".$this->view);
        //debug_print_backtrace();

        if ($this->view)
        {
            extract($this->data);
            require("views/" . $this->view . ".phtml");

        }
    }

    // Přesměruje na dané URL
    public function forward($url)
    {
        //echo "forwarding ".$url;
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    // Hlavní metoda controlleru
    abstract function process($params);

}