<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<html>
    <head>
           <title>Mailing List</title>
        <link href="/css/styles.css" rel="stylesheet"/>
    </head>
    <body>
         <div class="container">
             <div class="content">
                   <form action="{{ URL::route('SendMail') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <h2>Mailing List</h2> <p>Send To</p><br/>
                  <?php $mailcount=0;
                        $namecount=0;
                        ?>
                  @if(isset($users))
              
                  @foreach($users as $values)
<!--              {{$values['FirstName']}}-->
<input type='checkbox' name='mail_{{$mailcount++}}' value="{{$values['Email']}}" CHECKED />{{$values['FirstName']}}<?php echo " " ?>{{$values['LastName']}}<?php echo "(" ?>{{$values['Email']}} <?php echo ")" ?><br/>
<input type='hidden' name="name_{{$namecount++}}" value="{{$values['FirstName']}}"><br/>
<input type="hidden" name="count" value="{{$mailcount}}"/>
@endforeach
           
                @endif
                    <p>Message:<br/>
                        <textarea name="message" rows="5" cols="30"></textarea>
            </p>
            <input type="submit" name="submit" value="submit"/>
                   </form></div>
         </div>
    </body>
</html>

