<?php
/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 12.04.2017
 * Time: 14:25
 */

class HomeController extends Controller
{
    public function process($params)
    {
        $this->header['title'] = "Adam Ježek";
        $this->view = "home";
        //print_r($params);
        if(sizeof($params) == 0)
            $params[0] = "cs";

        $getContent = new GetHomeContent();
        $content = $getContent->get($params[0]);
        $this->content = $content;

        if(isset($_POST["name"])) { //odeslani kontaktniho formulare
            $emailSender = new EmailSender();
            $emailSender->lang = $params[0];
            $emailSender->validate();

        }
    }
}

