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
        $string = "<div id='contain'>";
        $string .= "<div id='header'> <h1>BookSwap</h1> <h4>Share your books with Friends!</h4></div>";
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
       
        $string .= "<div class='info'>";
        $string .= $userImg;
        $string .= "<div class='deets'>";
        $string .= "<h2>".$userName."</h2>";
        $string .= "<h3>".$userNumB." Books </h3>";
        $string .= "</div>";
        $string .= "</div>";
        
      
        $string .= "<div class='books'>".$userBooks."</div>";
        $string .= "</div>";
        return $string;
    }

    /**
     * Basic end-Div Styling goes here.
     */
    function post_content(){
        $string = "<div id='footer'>BookSwap 2011. Emily Egeland</div>";
        $string .= "</div>";
        return $string;
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
