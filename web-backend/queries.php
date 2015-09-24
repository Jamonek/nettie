<?php


$locationQuery = sprintf("SELECT *,
        ( 3959 * acos( 
        cos(radians(%s)) * cos(radians(lat)) * 
        cos(radians(lng) - radians(%s)) + 
        sin(radians(%s)) * sin(radians(lat)) 
        ) ) AS distance
        FROM `User`
        HAVING distance < 50              
        ORDER BY distance LIMIT 10 ",
    mysql_real_escape_string($latitude), 
    mysql_real_escape_string($longitude), 
    mysql_real_escape_string($latitude));

$usernameQuery = sprintf("SELECT * FROM User WHERE username = %s",
    mysql_real_escape_string($username));

$fnameQuery = sprintf("SELECT * FROM User WHERE fname = %s " ,
    mysql_real_escape_string($username));

$nameQuery = sprintf("SELECT * FROM User WHERE fname = %s " ,
    mysql_real_escape_string($fname)
mysql_real_escape_string($lname));

$networkQuery = sprintf("SELECT * FROM connections WHERE connector = %s",
    mysql_real_escape_string($username));

$blocksQuery = sprintf("SELECT * FROM User WHERE username = %s",
    mysql_real_escape_string($username));

$schoolQuery = sprintf("SELECT * FROM User WHERE school = %s",
    mysql_real_escape_string($username));

$majorQuery = sprintf("SELECT * FROM User WHERE username = %s",
    mysql_real_escape_string($username));


$networkRequestQuery = sprintf("SELECT * FROM User WHERE username = %s",
    mysql_real_escape_string($username));

$blockQuery = sprintf("SELECT * FROM User WHERE username = %s",
    mysql_real_escape_string($username));



?>
