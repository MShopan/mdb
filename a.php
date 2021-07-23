<?php 
$mathing = 1001 ;
require('_boot/mdb.php');
require('_boot/mhtml.php');



// mhtml::sendMsg(12);





function hello($row){
    echo 'hello from a.php : ' , $row; 
} 


mhtml::h1('test h');
mhtml::br();



mhtml::startTable(); 

mhtml::startTr(); 
mhtml::th('name');
mhtml::endTr(); 

mhtml::startTr(); 
mhtml::td('mohammed');
mhtml::endTr(); 


mhtml::endTable(); 

$user =  DB::table('users')->where('id','2')
                     ->andWhere('lastName','mohammed')
                     ->limit(5)
                     ->get();

echo $user->get_sql();

mhtml::br();

$user =  DB::table('ca')

->get();

echo  mhtml::h3($user->get_sql());





?>