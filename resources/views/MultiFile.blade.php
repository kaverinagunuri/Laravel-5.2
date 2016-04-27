<html>
    <head>
        <title>
            Multiple file upload
        </title>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            form{
                background: #f5f5f5;
                padding: 20px;
                border-radius: 10px;
            }
            input[type="submit"]{
                background: #2e6da4;
                border: 0px;
                border-radius: 5px;
                color: #fff;
                padding: 10px;
                margin: 20px auto;
            }
        </style>
    </head>
    <body>
       <div class="container">
            <div class="content">
                
           <form action="{{ URL::route('MultiFile-post') }}" method="post" enctype="multipart/form-data">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="file" name="upload[]" multiple/>
            
            <input type="submit" value="UPLOAD" name="upload"/>
    </form>
               <p>@if(isset($MultiFile_value))
                
                {{ $MultiFile_value}}
               
                @endif</p>
            </div>
       </div>
    </body>
</html>

