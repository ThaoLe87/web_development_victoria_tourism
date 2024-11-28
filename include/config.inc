<?php
    if ($_SERVER['SERVER_NAME']== 'localhost') {
    define ( 'HOST', 'localhost' );
    define ( 'USER', 'root' );
    define ( 'PASS', '' );
    define ( 'DB', 'tourismvictoria' );
    }
    else {
    define ( 'HOST', 'xxx' );
    define ( 'USER', 'yyy' );
    define ( 'PASS', 'zzz!' );
    define ( 'DB', 'tttt' );
    }
?>
