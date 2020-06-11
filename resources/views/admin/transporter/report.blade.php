<!DOCTYPE html>
<html>
<head>
</head>
<body><br><br>
<center><h1>Grab-It Online Food Ordering System</h1></center>
<center><h2> Order Report</h2></center>

<table border="1">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Customer Name</th>
{{--        <th>Delivery People</th>--}}
        <th>Restaurant</th>
        <th>Address</th>
        <th>Cost</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order as $key=>$value1)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value1->user->name}}</td>
{{--            <td></td>--}}
            <td>{{$value1->shop->name}}</td>
            <td>{{$value1->user_address['building']}},{{$value1->user_address['street']}},{{$value1->user_address['city']}}</td>
            <td>{{$value1->invoice['total_pay']}}</td>

        </tr>
    @endforeach
    </tbody>
</table><br><br>
<hr>
<center><p>Thank you</p></center>
</body>
</html>

