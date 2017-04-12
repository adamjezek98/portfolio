<?php
/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 11.04.2017
 * Time: 22:25
 */



class ForwarderController extends Controller
{
    // Instance controlleru
    protected $controller;

    // Metoda převede pomlčkovou variantu controlleru na název třídy
    private function dashesToCamelCase($text)
    {
        $sentence = str_replace('-', ' ', $text);
        $sentence = ucwords($sentence);
        $sentence = str_replace(' ', '', $sentence);
        return $sentence;
    }

    // Naparsuje URL adresu podle lomítek a vrátí pole parametrů
    private function parseURL($url)
    {
        // Naparsuje jednotlivé části URL adresy do asociativního pole
        $parsedURL = parse_url($url);
        // Odstranění počátečního lomítka
        $parsedURL["path"] = ltrim($parsedURL["path"], "/");
        // Odstranění bílých znaků kolem adresy
        $parsedURL["path"] = trim($parsedURL["path"]);
        // Rozbití řetězce podle lomítek
        $splittedPath = explode("/", $parsedURL["path"]);
        return $splittedPath;
    }

    // Naparsování URL adresy a vytvoření příslušného controlleru
    public function process($parametry)
    {
        $parsedURL = $this->parseURL($parametry[0]);



        if (empty($parsedURL[0]))
            $this->forward('cs/home');

        // kontroler je 1. parametr URL
        $lang = array_shift($parsedURL);
        if(!in_array($lang,array("cs","en"))) {
            $lang = "cs";
            $this->forward($lang . '/home');
        }
        if (empty($parsedURL[0]))
            $this->forward($lang.'/home');
        $controllerClass = $this->dashesToCamelCase(array_shift($parsedURL)) . 'Controller';

        if (file_exists('controllers/' . $controllerClass . '.php'))
            $this->controller = new $controllerClass;
        else
            $this->forward('error404');

        // Volání controlleru
        $this->controller->process(array_merge(array($lang),$parsedURL));

        // Nastavení proměnných pro šablonu
        $this->data['title'] = $this->controller->header['title'];


        $getMenuLabels = new GetMenulabels();
        $this->data['labels'] = $getMenuLabels->get($lang);
        $this->controller->labels = $this->data['labels'];
        $this->lang = $lang;
        // Nastavení hlavní šablony
        $this->view = 'layout';

    }

}