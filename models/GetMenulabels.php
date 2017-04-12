<?php

/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 12.04.2017
 * Time: 15:27
 */
class GetMenulabels
{
    public function Get($lang)
    {



        if ($lang == "cs") {
            $labels["about"] = "O mě";
            $labels["references"] = "Reference";
            $labels["contacts"] = "Kontakt";
            $labels["blog"] = "blog";
            $labels["cv"] = "Životopis";
        } elseif ($lang == "en") {
            $labels["about"] = "About me";
            $labels["references"] = "References";
            $labels["contacts"] = "Contacts";
            $labels["blog"] = "blog";
            $labels["cv"] = "cv";
        }


        return $labels;
    }
}