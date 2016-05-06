<!doctype html>
<html>
    <head>
        <title>Mailing List</title>
         <link href="css/styles.css" rel="stylesheet"/>
    </head>
    <body>
        
        <?php $increment = 0; ?>
       
             <div class="container">
            <div class="content">
            <form action="{{URL::route('maillistsubmit')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    @if(isset($mail))
                    @foreach($mail as $value)
                    @foreach($value as $values=>$key)
                    @if($values=="name")
                   {{$key}}
                            @endif
                            @if($values=="Email")
                            ({{$key}})
                            <input type="checkbox" value="{{$key}}" name="mail_<?php echo $increment++; ?>"><br/>
                  
                    @endif
                    @endforeach
                    @endforeach
                    @endif
                  <br/>  <textarea class="form-control top" name="message" rows="5"></textarea>
                    <input type="hidden" name="count" value="<?php echo $increment; ?>">
                   
                      <br/>  <input type="submit" class="btn btn-default">
                   
                </div>
            </form>

            @if(isset($message))
            <div class="col-md-6 col-md-offset-3 alert alert-info">
                {{$message}}
            </div>
            @endif

     
             </div>
        </div>
    </body>
</html>