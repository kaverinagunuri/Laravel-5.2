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
           Create a Rating System for Your Website 
        </title>
        <link href="css/styles.css" rel="stylesheet"/>
    </head>
    <body>
         <div class="container">
            <div class="content">
           <form action="{{ URL::route('Currency-post') }}" method="post" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

           </form>
            </div>
         </div></body>
</html>