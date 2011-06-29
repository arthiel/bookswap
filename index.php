<?php
   require_once('basic_lib.php');
   require_once('BooksParse.class.php');
   require_once('UserParse.class.php');

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

   $string = head();
   $string .= pre_content();

   $string .= format_user("ducktape");
   $string .= format_user("clockfort");

   $string .= post_content();
   $string .= footer();
   echo $string;
?>
