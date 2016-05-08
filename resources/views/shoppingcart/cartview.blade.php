<!doctype html>
<html>
    <head>
        
        <title>Cart</title>
        <script src="/js/jquery.js" type="text/javascript"></script>
        
        <script src="/js/shoppingcart.js" type='text/javascript'></script>
        
    </head>
    <body>
        <nav>
            @include('shoppingcart/dashboard')
        </nav>
        <?php $id=null;?>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>quantity</th>
                    <th></th>
                    <th></th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                    
                </tr>
                <?php $total=0;?>
                @foreach($product as $values)
                <tr>
                @foreach($values as $value=>$key)
                <td>{{$key}}</td>
                @if($value=="Id")
                <?php $id=$key;?>
                @endif
                @if($value=="quantity")
                <?php $price=$key;?>
                <th><a href="{{ URL::route('incrementproduct',['id'=>$id])}}">[+]</a></th>
                <th><a href="{{ URL::route('decrementproduct',['id'=>$id])}}">[-]</a>
                </th>
                @endif
                @if($value=="Price")
                <?php $price=$price*$key;
              // $price= (int) bcmul($price, $key);
              //  number_format($price, 1)?>
                @endif
                @endforeach
                <td><?php $total=$total+$price;  echo $price;?></td>
                <td><a href="{{ URL::route('deleteproduct',['id'=>$id])}}">DELETE</a></td>
                </tr>
                @endforeach
                <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th><?php if(isset($total)){echo $total;}?></th></tr>
            </table>
                </div>
            </div>
          <div class=" col-md-5 col-md-offset-5">
            <form method="post" action="{{ URL::route('payment')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="price" value="<?php echo $total;?>">
                <input type="submit" class="btn btn-success" value="MakePayment">
            </form>
            </div>
        </div>
    </body>
</html>
