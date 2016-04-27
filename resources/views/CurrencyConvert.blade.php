<html>
    <head>
        <title>
            CURRENCY CONVERTER
        </title>
        @include('styles')
    </head>
    <body>
         <div class="container">
            <div class="content">
           <form action="{{ URL::route('Currency-post') }}" method="post" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <td> Amount::</td><td> <input type="text" name="amount"/></td></tr>
                <tr><td>From::</td><td><input type="text" name="from"/> <br/></td></tr>
                <tr><td> To::</td><td><input type="text" name="to"/><br/></td></tr>
                <tr><td colspan="2" ><input type="submit" name="convert"/></td></tr>
                
            </table>
               <p>@if(isset($converted_currency))
                   {{ $converted_currency}}
                   @endif
               </p>
        </form>  
            </div></div>
    </body>
</html>