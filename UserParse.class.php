<?php
    /** 
     * Class dedicated to parsing the userdata xml.
     */
    class UserParse
    {
        private $username;
        private $fullname;
        private $books;
        private $image;
        private $numbooks;
        private $domdoc;

        /** 
         * Create a UserParse instance
         */
        public function __construct( $username )
        {
            $this->domdoc = new DomDocument;
            $this->domdoc->load('users.xml');
            $users = $this->domdoc->getElementsByTagName('user');
            foreach($users as $user)
            {
                if($user->getElementsByTagName("username")->item(0)->nodeValue == $username)
                {
                    $this->username = $username;
                    $this->fullname = $user->getElementsByTagName("name")->item(0)->nodeValue;
                    $this->books = $user->getElementsByTagName("books")->item(0)->nodeValue;
                    $this->image = $user->getElementsByTagName("pic")->item(0)->nodeValue;
                    
                }
            }
        }
        
        /**
         * Return user image.
         */
        public function get_image()
        {
            return "<img src='".$this->image."' />";
        }

        /** 
         * Return user's fullname
         */
        public function get_fullname()
        {
            return $this->fullname;
        }

        /**
         * Get user's book list
         */
        public function get_booklist()
        {
            $mybooks = new BooksParse("bookdata/".$this->username.".xml");
            return $mybooks->display_books();
        }

        /** 
         * Get user's number of books.
         */
        public function get_numbooks(){
            $mybooks = new BooksParse("bookdata/".$this->username.".xml");
            return $mybooks->get_numBooks();
        }
    }
?>
