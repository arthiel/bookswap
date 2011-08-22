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
            if( $limit == 0 ){
                $limit = $item.size();
            }
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

        /** 
         * Display Books with editable fields in table
         */
        public function display_bookTable(){
            $string = "";
            $item = $this->domdoc->getElementsByTagName("book");
            $string .= "<table class='booktable'>";
            //print_r($item->item(0)->nodeValue);
            $string .= "<tr>";
            $string .= "<th> Title </th>";
            $string .= "<th> Author </th>";
            $string .= "<th> Format </th>";
            $string .= "<th> Borrowers</th>";
            $string .= "<th> Rating </th>";
            foreach($item as $book)
            {
                $string .= "<tr>";
                $string .= "<td>". $book->getElementsByTagName("title")->item(0)->nodeValue ."</td>";
                $string .= "<td>" . $book->getElementsByTagName("author")->item(0)->nodeValue . "</td>";
                $string .= "<td>" . $book->getElementsByTagName("format")->item(0)->nodeValue . "</td>";
                $string .= "<td>" . $book->getElementsByTagName("borrowers")->item(0)->nodeValue . "</td>";
                $string .= "<td>" . $book->getElementsByTagName("rating")->item(0)->nodeValue . "</td>";
                $string .= "</tr>";
            }
            $string .= "</table>";
            return $string;
        }
    } // End BooksParse class
?>
