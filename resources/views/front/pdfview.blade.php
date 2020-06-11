<html>
<head>

</head>
<body><br><br>
<center><h1>Grab-It Online Food Ordering System</h1></center>

<center><h2> Order Invoice</h2></center>
Order ID : -
<span>{{$orderinc->order_id}}</span><br><br>
Total Paid Amount :-
<span>{{$orderinc->total_pay}}</span><br><br>
Pay Via :-
<span>Paytm</span><br><br>
Transaction Id :-
<span>{{$orderinc->transaction_id}}</span>
<br><br>

<table border="1">
    <tr>
        <td>
            Product
        </td>
        <td>
            Quantity
        </td>
        <td>
            Price
        </td>
        <td>Total</td>
    </tr>
    @foreach($usercart as $value)
        <tr>

            <?php $pro=\App\Product::where('id',$value['product_id'])->first();
            $pro1=\App\ProductPrice::where('product_id',$pro->id)->first();
            ?>
            <td>{{$pro->name}}</td>
            <td>{{$value->quantity}}</td>

            <td>{{$pro1->price}}</td>
            <td>{{$value->quantity * $pro1->price}}</td>
        </tr>
    @endforeach
    <td colspan="4" align="right">    {{$orderinc->total_pay}}</td> <br><br></tr>
</table><br><br>
<hr>
<center><p>Thank you</p></center>

</body>
</html>
