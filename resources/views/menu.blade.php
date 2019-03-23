<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$restaurant->name}}-Menu</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>
</head>


<body>
<br>

<br>


    <br>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>

                    <th width="200" style="text-align: center">圖</th>
                    <th width="200" style="text-align: center">菜名</th>
                    <th width="200" style="text-align: center">價格</th>
                    <th width="200" style="text-align: center">數量</th>
                    <th width="70" style="text-align: center">操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach($meals as $meal)
                    <form method="POST" action="/order/{{$meal->id}}/item">
                        {{ csrf_field() }}
                        <tr>

                            <td style="text-align: center"><img src="{{$meal->photo}}"width="80" height="40"></td>
                            <td style="text-align: center">{{$meal->name}}</td>
                            <td style="text-align: center">{{$meal->price}}</td>
                            <td style="text-align: center"><input type="text" name="quantity"></td>
                            <td style="text-align: center">
                                <input type="hidden" name="order_id" value=" {{$order->id}}">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>我要這個
                                </button>

                            </td>
                        </tr>
                    </form>




                </tbody>

    </table >
        </div>
    </div>
    </div>
@endforeach
</body>
</html>