<html>
    <head>
       <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Auto suggest
        </title>
       <link href='css/styles.css' rel="stylesheet"/>
        <link rel="stylesheet" href="css/search.css"/>
        <script type="text/javascript" src="js/jquery-2.2.2.min.js" />  </script> 
      <script type="text/javascript" src="js/suggest_script.js" /> </script> 
      
        
    </head>
    <body>
         <div class="container">
            <div class="content">
                <h2>  Auto suggest</h2>
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
         <input type="text" class="autosuggest"/>
         <br/>
     
        <div class="dropdown">
            <ul class="result">
                
            </ul>
        </div>
                 
            </div></div>
    </body>