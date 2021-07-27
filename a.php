<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include('_boot/style.html');
    ?> 

</head>
<body>

<?php 
$mathing = 1001 ;


require('_boot/bootstrap.php');



// mhtml::sendMsg(12);





function hello($row){
    echo 'hello from a.php : ' , $row; 
} 


mhtml::h1('test h');
mhtml::br();





// $user =  DB::table('users')->where('id','2')
//                      ->andWhere('lastName','mohammed')
//                      ->limit(5)
//                      ->get();

// echo $user->get_sql();

mhtml::br();


$waiters =  DB::table('section')->get();

mhtml::print_r_table($waiters , array('name','waiter','creator'));


// mhtml::print_r($waiters);

// echo mhtml::dump($user->result);

// $_arr = new array ([
//     'email' => 'kayla@example.com',
//     'votes' => 0
// ]);

// $test =  DB::table('users')->insert( array ( 
//     'email' => 'kayla@example.com',
//     'votes' => 0 ,
//     'aa' => "m" ,
// ));


// echo  mhtml::h3($test->get_sql());


// mhtml::br();

// $test2 =  DB::table('twitter')
//             ->where('seasion' , '5' )
//             ->andwhere('id','>','2')
//             ->orWhere('fristName','<>','khaled')
//             ->where('name','ali')
//             ->get();


// echo  mhtml::h3($test2->get_sql());

// mhtml::br();

// $test4 =  DB::table('users')->where('id',9)
//                    ->delete();


// echo  mhtml::h3($test4->get_sql());

// mhtml::br();

// $TEST3   =  DB::table('users')->drop();


// echo  mhtml::h3($TEST3  ->get_sql());

// $test55   =  DB::table('users')->where('id',2)->where('name','LIKE','%s')
//                           ->update(array('name'=>'ali' , 'coadx' => 010001000 ) );


// echo  mhtml::h3($test55  ->get_sql());


?>

    
</body>
</html>
