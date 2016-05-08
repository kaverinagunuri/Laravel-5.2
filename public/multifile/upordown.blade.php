<!doctype html>
<html>
    <head>
        <title>WebsiteUporDown</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/upordown.js"></script>
    </head>
    <body>
        <form action="{{URL::Route('upordown')}}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          Up or Down?  <input  type="text" name="url" id="url" placeholder="search">
            <input  type="submit">
        </form>
    </body>
</html>