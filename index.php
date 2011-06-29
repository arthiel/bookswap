<?php
   require_once('basic_lib.php');
   require_once('BooksParse.class.php');
   require_once('UserParse.class.php');

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

   $string = head();
   $string .= pre_content();

   $mybooks = new BooksParse("bookdata/ducktape.xml");
   $data = $mybooks->display_books();

   $myuser = new UserParse( "ducktape" );
   $userImg = $myuser->get_image();
   $userName = $myuser->get_fullname();

   $string .= fit_content( "Book Swap: A site dedicated to sharing your books" );

   $string .= "<br />".$userImg;
   $string .= "<h2>".$userName."</h2>";

   $string .= fit_content($data);
   $string .= post_content();
   $string .= footer();
   echo $string;
?>
