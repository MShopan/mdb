var logfile = ``;

var _files = JSON.parse( log_file_names );
var log_file_name = _files[_files.length - 1];


console.log(_files);

loadLog();

// setInterval(() => {
//     try{

//         loadLog();
//     } catch (error) {
//         // do nothing
//     }




// }, 2000 );

// import function for string will use
// splite
// substr
// trim

var vm_log = new Vue({
    el: '#view_log',
    data:{
        logObj : []
    }
});

// function analyse 
function analyseLog(data){

logfile = data ; 

var _lines = logfile.split('\n');

var lines = _lines.filter(function (el) {
    return el != "";
});

// console.log(lines);

var logObj = [] ;

lines.forEach(line => {
    try {
        let line_content = line.split("]");

        let _date = line_content[0].substr(1);
        let _class = line_content[1].substr(1);
        // !important use king in the future to set color and king of log
        let _kind = line_content[2].substr(1);        
        let _data = line_content[3].trim().substr(1);
        
    
        myObj = { 
            'date' : _date , 
            'class' : _class , 
            'kind' : _kind ,
            'data' : _data 
         }
    
         logObj.push(myObj);
        
    } catch (error) {
        // do nothing 
    }


    });
    
    // console.log(logObj);
    
    vm_log.logObj = logObj ;



}

// end function 
    function loadLog() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          let logfile = this.responseText;
        //   console.log(logfile);
          analyseLog(this.responseText);
        }
        xhttp.open("GET", `../../log/${log_file_name}`, true);
        xhttp.send();
    }



  

// document.getElementById('view_log').innerText = logfile ;





