<html>
    <head>
       <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Auto suggest
        </title>
        @include('styles')
     
        <script type="text/javascript" src="js/jquery-2.2.2.min.js" />  </script> 
      <script type="text/javascript" src="js/suggest_script.js" /> </script> 
      
        <style>
            
           
.autosuggest,.dropdown,.result{
    margin: 0;
    padding: 0;
    border: 0;
    width: 250px;
}
.autosuggest{
    padding: 4px;
    border: 1px solid black;
}
.result{
    width: 260px;
    list-style: none;
}
.result li{
    padding: 5px;
    border: 1px solid black;
    border-top:0;
    cursor: pointer;
}
.result li:hover{
    background: #000;
    color: #fff;
}
        </style>
    </head>
    <body>
         <div class="container">
            <div class="content">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
         <input type="text" class="autosuggest"/>
         <br/>
     
        <div class="dropdown">
            <ul class="result">
                
            </ul>
        </div>
                <input type="submit" value="search"/>    
            </div></div>
    </body>