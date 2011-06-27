<?php
    
    /**
     * Basic header stuff.
     */
    function head(){
        $string = "<!DOCTYPE HTML>";
        $string .= "<head> <title> Book Swap </title>";
        /** STYLES WILL GO HERE **/
        $string .= "</head>";
        $string .= "<body>";
        return $string;
    }

    /** 
     * Basic Div Styling will go here
     */
    function pre_content(){

    }

    /** 
     * Positions given content into div.
     */
    function fit_content( $content ){
        return $content;
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
