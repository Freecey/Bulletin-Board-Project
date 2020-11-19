<?php
// WORK IN PRGRESS, NEEDS SOME UPDATES
$baseUrl = "index.php"
function createBreadCrumbs() {
    global $baseUrl;
    $urlParse = parse_url( $baseUrl.$_SERVER["REQUEST_URI"], PHP_URL_PATH ); //appends the http://.../ to /folder1/subfolder/file.php

    $crumbs = explode( "/", $urlParse ); //transforms /folder/folder/file.php -> array['','folder','subfolder','file.php']
    
    $REMOVE = array( "", "index.php" ); //an array that will hold strings to be removed -> array['folder','subfolder','file.php']
    
    $crumbs = array_diff( $crumbs, $REMOVE );// remove the elements who's values are stored in REMOVE array

    $totalCrumbs = count( $crumbs ); //counts the number of items in the array $crumbs
    $count = 0;

    //this is the subdirectory we are on the folder...
    $uri = "/cds/garibaldi/";
    foreach ( $crumbs as $crumb ) {
        $count++;

        if ( $count!=$totalCrumbs ) { //checks if we are at the end of the urlParse
            //not at end so, lets append an > to the url, and then for the href lets add the additonal crumb to the uri string...
            echo '<a href="'.$uri.$crumb.'">'.ucwords( str_replace( array( "-", ".php", "_" ), array( " ", "", " " ), $crumb ) . '</a> > ' );
        } else {
            //at the end of the uri string, we don't need >, and for href lets use the requesting URI (works well when pass arguments and queries ?,# in URI)
            echo '<a href="'.$_SERVER["REQUEST_URI"].'">'.ucwords( str_replace( array( "-", ".php", "_" ), array( " ", "", " " ), $crumb ) . '</a>' );
        }
        //add the string to the uri and store it.
        $uri = $uri.$crumb.'/';
    }
}
?>