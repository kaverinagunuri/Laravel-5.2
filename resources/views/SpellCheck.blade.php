<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>
            Spell Checker
        </title>
        <link href='css/styles.css' rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="{{ URL::route('check') }}" method="get">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="text" name='word'/><br/>
        <input type="submit" value='check'/>
        </form>
            </div></div>
    </body>
</html>
