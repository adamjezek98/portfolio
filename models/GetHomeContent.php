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


        if ($lang == "cs") {
            $content["about"] = $lorips;//"aboutcontent";
            $content["references"] = $lorips;//"Referencecontent";
            $content["contacts"] = $lorips;//"Kontaktycontent";
            $content["blog"] = $lorips;//"blogcontent";
            $content["cv"] = $lorips;//"Životopiscontent";

            //email form
            $content["contact_me"] = "Kontaktujte mě pomocí formuláře níže nebo přímo na mail@ajezek.cz";
            $content["your_name"] = "Vaše jméno";
            $content["your_email"] = "Váš email";
            $content["your_message"] = "Vaše zpráva";
            $content["send_email"] = "Odeslat zprávu";
            $content["email_ok"] = "Úspěšně odesláno";
            $content["email_nok"] = "Někde se stala chyba. Zkontrolujte údaje a zkuste to prosím znovu";
            $content["antispam"] = "(antispam) 2+2=";
        } elseif ($lang == "en") {
            $content["about"] = "About me";
            $content["references"] = "References";
            $content["contacts"] = "Contacts";
            $content["blog"] = "blog";
            $content["cv"] = "cv";

            //email form
            $content["contact_me"] = "You can contact me using the form bellow, or directly by emailing me at mail@ajezek.cz";
            $content["your_name"] = "Your name";
            $content["your_email"] = "Your email";
            $content["your_message"] = "Your message";
            $content["send_email"] = "Send message";
            $content["email_ok"] = "Successfully sent";
            $content["email_nok"] = "Something got wrong. Check entered data and try again";
            $content["antispam"] = "(antispam) 2+2=";
        }


        return $content;
    }
}