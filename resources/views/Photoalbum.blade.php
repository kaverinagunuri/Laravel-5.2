<!doctype html>
<html>
    <head>
        <title>
            PHOTO ALBUM
        </title>
        <link href="css/lightbox.css" rel="stylesheet">
        <link href="css/styles.css"  rel="stylesheet">
        
        <script type="text/javascript" src="js/jquery-2.2.2.min.js"></script> 
        <script type="text/javascript" src="js/lightbox-2.6.min.js"></script>
   
</head>
<body> 
    <div class="container">
        <div class="content">
            @if(isset($Photoalbum_folder))
            <b>{{$choice}}</b><br/>
            @foreach($Photoalbum_folder as $folder)
            <a href="{{URL::route('folder',["folder"=>$folder])}}">{{$folder}}</a> <br/>
            @endforeach
            @endif


            @if(isset($image))  
            @foreach($image as $path)
            <a href="{{$path}}" data-lightbox='nondatabasealbum'><img src="{{$path}}" width="100" height="100" /></a>
            @endforeach
            @endif  
            <br/><a href="{{URL::route('index')}}">Back to Album</a>
        </div>

    </div>
</body>
</html>
