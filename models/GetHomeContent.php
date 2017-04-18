<?php

/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 12.04.2017
 * Time: 16:47
 */
class GetHomeContent
{

    public function Get($lang)
    {
        $lorips = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacus metus, scelerisque eget tortor at, interdum elementum odio. Nam pharetra condimentum nisl, eu maximus metus ultrices ornare. Curabitur egestas purus at pharetra laoreet. Aliquam lacinia ante et dapibus mollis. Donec ac volutpat neque. Morbi lacinia et sapien id dapibus. Nam hendrerit id mi at imperdiet. Phasellus pharetra ipsum nunc, vel fermentum justo convallis sed. Curabitur rutrum ut diam id venenatis. Ut tincidunt feugiat porta. Quisque et risus sapien. Sed interdum ligula nec tellus convallis ornare. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut dapibus est nulla, eget sagittis lorem tristique eget. Vestibulum eget dolor velit.

In placerat ex id risus dictum bibendum. Nulla facilisi. Praesent vulputate elit eros, eu consectetur quam pellentesque maximus. Curabitur mollis, tortor non aliquam auctor, justo quam posuere dolor, ut feugiat lacus odio quis lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc placerat erat eget lacus hendrerit, quis tristique metus tempus. Phasellus gravida, dui eu laoreet convallis, ante sapien accumsan risus, vel aliquam augue enim eu dui. Suspendisse scelerisque metus bibendum augue faucibus, non cursus purus porta. In eget tristique purus, quis finibus massa. Nunc ut risus nec sapien luctus condimentum. Sed ultrices ex dignissim lacus viverra, vitae aliquet orci facilisis.";

    $content = array();

        require("dbconf.php");

        $command = $dbconn->prepare("SELECT name, content FROM homestrings WHERE lang='$lang'"); //
        $command->execute();
        $res = $command->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($command as $com) {
            $content[$com["name"]] = $com["content"];
        }



        $command = $dbconn->prepare("SELECT header, content FROM refs WHERE lang='$lang'"); //
        $command->execute();
        $res = $command->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($command as $com) {
            $content["references"][$com["header"]] = $com["content"];
        }

        $command = $dbconn->prepare("SELECT header, content FROM abilities WHERE lang='$lang'"); //
        $command->execute();
        $res = $command->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($command as $com) {
            $content["abilities"][$com["header"]] = $com["content"];
        }



        return $content;
    }
}