<?php

require('_boot/bootstrap.php');

mhtml::dump(auth::hasAccess($_GET['per']));

mhtml::h1(__DIR__);

//find functon get now data in php.
// Source: https://stackoverflow.com/a/40484613 .
$now = date_create()->format('Y-m-d H:i:s');

mhtml::h1($now);
mhtml::h1($now);


mhtml::h1($now);
mhtml::h1($now);
mhtml::h1($now);
mhtml::h1($now);


      




?>