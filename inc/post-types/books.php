<?php
$book = new Custom_Post_Type( 'Book' );
$book->add_taxonomy( 'category' );
$book->add_taxonomy( 'author' );
 
$book->add_meta_box( 
    'Book Info', 
    array(
        'Year' => 'text',
        'Genre' => 'text'
    )
);
 
$book->add_meta_box( 
    'Author Info', 
    array(
        'Name' => 'text',
        'Nationality' => 'text',
        'Birthday' => 'date'
    )
);

$book->add_meta_box( 
    'Info', 
    array(
        'Rating'=> ['select','options' => [[ 'Um',  '1' ],[ 'Dois', '2' ]] ],
        'Rating International'=> ['radio','options' => [[ 'Um',  '1' ],[ 'Dois', '2' ]] ]
    )
);
