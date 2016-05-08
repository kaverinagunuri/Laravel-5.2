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
          SearchEngine
        </title>
        <link href="css/styles.css" rel="stylesheet"/>
        
    </head>
    <body>
       
        <div class="container">
             <div class="content">
                 <h2>   Search  Engine</h2>
             <div class="alert">
            @if(isset($errors))
            @foreach($errors as $values)
            {{$values}}<br/>
            @endforeach
            @endif
        </div>
                
           
                <form action="{{URL::route('Search')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2> Search</h2>
                        <p>    <input type="text" name="keyword" /></p>
                        <p>  <input type="submit" value="SEARCH" name="search"/></p>  
                         @if(isset($correct))
                <?php echo $correct?>
                 @foreach($result as $data)
                 @foreach($data as $key=>$value)
                 @if($key=='Url')
                 <a href="{{$value}}">{{$value}}</a>
                  
               @else
                 {{$value}}
                @endif
                
                 @endforeach <br/>
                 @endforeach
                 @endif
              </form>
            </div>
        </div>
    </body>
</html>
