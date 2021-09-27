<?php

/**
 * Created by PhpStorm.
 * User: jezek
 * Date: 12.04.2017
 * Time: 21:33
 */
class EmailSender
{
    public $lang = "";
    public function validate()
    {
        $ok = true;


        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            //$ok = false;

        }

        if ($_POST["antispam"] != "4") {

            //$ok = false;
        }



        if ($ok) {
            htmlspecialchars(htmlentities($name = $_POST["name"]));
            $email = $_POST["email"];
            htmlspecialchars(htmlentities($message = $_POST["message"]));
            $message .= "\n\n<br/><br/>---\n<br/>
            New message from contact form at ajezek.cz\n<br/>
            Sender: " . $name ."; ". $email . "\n<br/>
            Sent ". date('d.m.Y h:i:s a', time());
            $_POST = array();
            $_POST["email_ok"] = false;
            //$this->send("mail@ajezek.cz", "Contact form - message from " . $name, $message, $email);
            if($this->lang == "cs"){
                $confirmation = "Vaše zpráva pro mail@ajezek.cz byla doručena";
                $bodyconfirm = $confirmation ."<br/>Vaše zpráva:<br/>";
            } elseif($this->lang =="en") {
                $confirmation = "Your message for mail@ajezek.cz was delivered";
                $bodyconfirm = $confirmation ."<br/>VYour message:<br/>";
            }
            //$this->send($email,$confirmation,$bodyconfirm.$message,$email);

        } else {
            $_POST["email_ok"] = false;
        }
    }

    public function send($to, $subject, $message, $from)
    {
        $header = "From: info@ajezek.cz";
        $header .= "\nMIME-Version: 1.0\n";
        $header .= "Content-Type: text/html; charset=\"utf-8\"\n";
        return mb_send_mail($to, $subject, $message, $header);
    }
}
