<?php
    
    /**
     * Basic header stuff.
     */
    function head(){
        $string = "<!DOCTYPE HTML>";
        $string .= "<head> <title> Book Swap </title>";
        $string .= "<link rel='stylesheet' type='text/css' href='style.css' />";
        /** STYLES WILL GO HERE **/
        $string .= "</head>";
        $string .= "<body>";
        return $string;
    }

    /** 
     * Basic Div Styling will go here
     */
    function pre_content(){
        $string = "<div id='header'> <h1>BookSwap</h1> <h4>Share your books with Friends!</h4></div>";
        return $string;
    }

    /** 
     * Positions given content into div.
     */
    function fit_content( $content ){
        return $content;
    }

    /** 
     * Takes username and formats userdata for it.
     */
    function format_user( $username ){
        $thisuser = new UserParse( $username );
        $userImg = $thisuser->get_image();
        $userName = $thisuser->get_fullname();
        $userBooks = $thisuser->get_booklist();
        $userNumB = $thisuser->get_numbooks();
        
        $string = "<div class='user'>";
        $string .= "<h2>";
        $string .= $userImg;
        $string .= $userName;
        $string .= "</h2>";
        $string .= "<h3>".$userNumB." Books </h3>";
        $string .= $userBooks;
        $string .= "</div>";
        return $string;
    }

    /**
     * Basic end-Div Styling goes here.
     */
    function post_content(){

    }

    /**
     * Basic footer stuff.
     */
    function footer(){
        $string = "</body>";
        $string .= "</html>";
        return $string;
    }

?>
