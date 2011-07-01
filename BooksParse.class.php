<?php
    /** 
     * Class dedicated to parsing the BooksData XML file.
     */
    class BooksParse
    {
        private $XMLFILE;
        private $domdoc;
        
        /** 
         * Create an BooksData XML parse object.
         */
        public function __construct( $xmlfile )
        {
            $this->XMLFILE = $xmlfile;
            $this->domdoc = new DomDocument;
            $this->domdoc->load($this->XMLFILE);
        }

        /** 
         * Get the number of books owned by the user.
         */
        public function get_numBooks()
        {
            $item = $this->domdoc->getElementsByTagName("book");
            $x = 0;
            foreach($item as $book)
            {
                $x++;
            }
            return $x;
        }

        /** 
         * Add a book to the list.
         */
        public function add_book( $title, $author, $available, $format, $borrowers, $rating )
        {
            $mytitle = $this->domdoc->createElement('title', $title);
            $myauthor = $this->domdoc->createElement('author', $author);
            $myavail = $this->domdoc->createElement('available', $available);
            $myformat = $this->domdoc->createElement('format', $format);
            $myborrows = $this->domdoc->createElement('borrowers', $borrowers);
            $myrating = $this->domdoc->createElement('rating', $rating);

            $newbook = $this->domdoc->createElement('book');
            $newbook->appendChild($mytitle);
            $newbook->appendChild($myauthor);
            $newbook->appendChild($myavail);
            $newbook->appendChild($myformat);
            $newbook->appendChild($myborrows);
            $newbook->appendChild($myrating);

            $booklist = $this->domdoc->getElementsByTagName("books")->item(0);
            $booklist->appendChild($newbook);
            $this->domdoc->save($this->XMLFILE);
        }

        /** 
         * Display Books.
         */
        public function display_books($limit)
        {
            $string = "";
            $item = $this->domdoc->getElementsByTagName("book");
            $i = 1;
            foreach($item as $book)
            {
                $string .= "<p>" . $book->getElementsByTagName("title")->item(0)->nodeValue ."</p>";
                if($i >= $limit){
                    return $string;
                }
                $i++;
            }
            return $string;
        }
    } // End BooksParse class
?>
