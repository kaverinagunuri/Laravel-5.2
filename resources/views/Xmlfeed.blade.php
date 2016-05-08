<html>
    <head>
        <title>
         How to Read XML, RSS and ATOM Feeds
        </title>
         <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body> 
        <div class="container">
            <div class="content">
                <h2>  How to Read XML, RSS and ATOM Feeds</h2>
                <ul>
                  @if(isset($Xmlfeed_url) && $Xmlfeed_title)
                  <?php
                  for($x=0;$x<count($Xmlfeed_url);$x++)
                 
                    echo '<li><a href="',$Xmlfeed_url[$x],'">',$Xmlfeed_title[$x],'</a></li>';?>
                   
                   
                  @endif
                </ul>
            </div>
        </div>
    </body>
</html>