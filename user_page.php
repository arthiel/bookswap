<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    
    require_once('basic_lib.php');
    require_once('UserParse.class.php');
    require_once('BooksParse.class.php');
    echo head();
    echo pre_content();
    

    $user = $_GET['user'];
    $my_user = new UserParse($user);

    echo format_user($user);
    $books_user = new BooksParse("bookdata/" .$user . ".xml");
    echo $books_user->display_bookTable();
    echo post_content();
    echo footer();
?>
