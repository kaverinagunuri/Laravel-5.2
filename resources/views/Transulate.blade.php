<html>
    <head>
        <title>
         Transulate Page Language
        </title>
         <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body> 
        <div class="container">
            <div class="content">
                <h2>  Transulate Page Language</h2>
              <p> 
                  @if(isset($Transulate_value))
                  {{$Transulate_value}}
                  @endif
              </p>
            </div>
        </div>
    </body>
</html>