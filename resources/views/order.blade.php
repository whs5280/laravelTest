<!doctype html>
<html>
<head>
    <title>订单信息</title>
    <link href="{{ URL::asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body onload="return total();">
<div class="container">
    <div>
        <h4>订单详情</h4>
    </div>
    <form method="get">
        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Number</th>
                    <th scope="col">APrice</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->number }}</td>
                        <td><span class="price">{{ $order->price * $order->number }}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </form>
    <div class="m-3">
        总价：<span id='total' id="total"></span>
        <button type="submit" class="btn btn-outline-info" name="pay" value="pay">支付宝支付</button>
        <button type="submit" class="btn btn-outline-success" name="pay" value="pay">微信支付</button>
    </div>
</div>

<script>
    function total() {
        var arr = [];
        var sum = 0;
        var price = document.getElementsByClassName("price");
        for (i in price){
            if (price[i].className == "price"){
                arr.push(price[i].innerHTML);
            }
        }
        for (var i=0;i<=arr.length-1;i++){
            sum += Number(arr[i]);
        }

        var total = document.getElementById('total');
        total.innerText = sum;
    }
</script>
</body>
</html>
