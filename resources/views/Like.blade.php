<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
           <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
           Like -- Button
        </title>
        <link href="css/styles.css" rel="stylesheet"/>
          <link href="css/Likestyles.css" rel="stylesheet"/>
         <link href="css/urlStyles.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery-2.2.2.min.js" />  </script> 
      <script type="text/javascript" src="js/like.js" /> </script> 

    </head>
    <body>
        <div class="container">
            <div class="content">
                <h2>  Like -- Button</h2>
                 <form action="{{ URL::route('LikeButton') }}" method="post" >
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="view">
            @if(isset($Result))
            @foreach ($Result as $result_data)
            <ul>
         
<!--              {{$result_data['ArticleTitle']."(". $result_data['ArticleLike'].")"}} -->
             <li><p> {{$result_data['ArticleTitle']}}</p><p> <a href="#" class="like" onClick="like_add({{$result_data['ArticleId']}})">Like</a> <span id="article_{{$result_data['ArticleId']}}_likes">{{ $result_data['ArticleLike']}}</span> Like this</p></li>
              @endforeach
              </ul>
              @endif
               </div>
               <span id="danger">
               </span>
                 </form>
                
            </div>
        </div>
    </body>
</html>

