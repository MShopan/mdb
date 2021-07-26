<?php

require('../mhtml.php');

$files = scandir("../../log");

$file_names = $files;

$file_names_json = json_encode($file_names);

echo "<script> var log_file_names = '$file_names_json' ;</script>" ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><script src="vue.js"></script>

    <style>
      .log-table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      .log-table td, .log-table th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      .log-table tr:nth-child(even){background-color: #f2f2f2;}
      
      .log-table tr:hover {background-color: #ddd;}
      
      .log-table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
      </style>

</head>
<body>

    <div id="view_log">
        <table class="log-table">
          <tr>
            <th>Date</th>
            <th>Class</th>
            <th>Data</th>
          </tr>
          <tr v-for="log in logObj "> 
            <td>{{ log.date }}</td>
            <td>{{ log.class }}</td>
            <td>{{ log.data }}</td>
          </tr>
        </table>
    </div>

    <div id="demo"></div>
    
</body>
  <script src="view_log.js"></script>
</html>