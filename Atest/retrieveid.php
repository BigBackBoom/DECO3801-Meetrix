<?php

$array=array('dingo' => 'Dog',
	'wombat' => 'Wm');
	
	$sql = "INSERT INTO testtable (name,description) VALUES ";
	
	$it= new ArrayIterator($array);
	
	$cit = new CachingIterator($it);
	
	foreach($cit as $value)
	{
	$sql .=.= "('".$cit->key()."','" .$cit->current()."')";
        // if there is another array member, add a comma
        if( $cit->hasNext() )
        {
            $sql .= ",";
        }
    }


    // now we can use a single database connection and query
    $conn = mysql_connect('localhost', 'Menu6Rainy*guilt' );
    mysql_select_db( 'test', $conn );
    mysql_query( $sql, $conn );
?>