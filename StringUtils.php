<?php
class StringUtils{
    public static function FormatEmail(string $email){
        return  str_replace('@gmail.com','ATgmail_com',$email);
    }
}
?>
