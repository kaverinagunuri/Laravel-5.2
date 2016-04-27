<html>
    <head>
        <title>
            Find and Replace
        </title>
        
       
        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body> 
        <div class="container">
            <div class="content">
                
           
           <form action="{{ URL::route('Findreplace-post') }}" method="post" enctype="multipart/form-data">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
            <input type="text" name="find" placeholder="words,to,find"/>
            <input type="text" name="replace" placeholder="replace,text,here"/><br>
            <p><textarea name="text" rows="10" cols="30">
               </textarea></p>
            <input type="submit" value="submit" name="submit"/>
           </form>
            </div>
        </div>
    </body>
</html>