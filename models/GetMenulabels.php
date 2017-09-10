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
        require("dbconf.php");

        $command = $dbconn->prepare("SELECT name, content FROM labels WHERE lang='$lang'"); //
        $command->execute();
        $res = $command->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($command as $com) {
            $labels[$com["name"]] = $com["content"];
        }

        return $labels;
    }
}