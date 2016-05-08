<!doctype html>
<html>
    <head>
        <title>shoutbox</title>
        <script src="/js/jquery.js"></script>
        <script src="/js/likebutton.js"></script>
        <style>
           
        </style>
    </head>
    <body>
       
        <div class="container">

            <div class="col-md-12 border">
                @if($array!=null)
                @foreach($array as $value)
                @foreach($value as $values=>$key)
                @if($values=='name')
                <p>{{$key}}-
                @endif
                @if($values=='message')
                {{$key}}</p>
                @endif
                @endforeach
                @endforeach
                @endif
                
            </div>
            <form method="post" action="{{ URL::route('shoutboxsubmit')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="col-md-12 top">     
                <div class="col-md-2">
                    <div class="form-group">
                        <h2> shoutbox</h2>
                        <label for='name' class="control-label">Name:</label>
                        <input type="text" id='name' name="name" value="guest" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for='message' class="control-label">Shout:</label>
                        <input type="text" id='message' name="message" class="form-control">
                    </div>
                </div>
                
                <div class="col-md-1">
                    <div class="form-group">
                        
                        <label  class="control-label">  </label>
                    <input type="submit" value="Shout" class="btn btn-default">
                </div>
                </div>
                    </div>
            </form>


        </div>
    </body>
</html>