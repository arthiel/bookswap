<?php
   require_once('basic_lib.php'); 
   $string = head();
   $string .= pre_content();
   $string .= post_content();
   $string .=  footer();
   echo $string;
?>
