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
              @include('menu')
              <p> 
                  @if(isset($Transulate_value))
                  {{$Transulate_value}}
                  @endif
              </p>
            </div>
        </div>
    </body>
</html>