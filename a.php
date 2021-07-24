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

// $user =  DB::table('users')->where('id','2')
//                      ->andWhere('lastName','mohammed')
//                      ->limit(5)
//                      ->get();

// echo $user->get_sql();

mhtml::br();

$user =  DB::table('ca')

->get();

echo  mhtml::h3($user->get_sql());

// $_arr = new array ([
//     'email' => 'kayla@example.com',
//     'votes' => 0
// ]);

$test =  DB::table('users')->insert( array ( 
    'email' => 'kayla@example.com',
    'votes' => 0 ,
    'aa' => "m" ,
));


echo  mhtml::h3($test->get_sql());


mhtml::br();

$test2 =  DB::table('users')
            ->where('id','2')
            ->orWhere('fristName','khaled')
            ->where('name','ali')
            ->get();


echo  mhtml::h3($test2->get_sql());

mhtml::br();

$test4 =  DB::table('users')->where('id',9)
                   ->delete();


echo  mhtml::h3($test4->get_sql());

mhtml::br();

$TEST3   =  DB::table('users')->drop();


echo  mhtml::h3($TEST3  ->get_sql());
?>