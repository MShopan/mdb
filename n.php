<?php

require('/_boot/bootstrap.php');

mhtml::dump(auth::hasAccess($_GET['per']));


?>