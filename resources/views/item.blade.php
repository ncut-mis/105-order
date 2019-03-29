<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>點餐明細</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>
</head>


<body>

<script>
    var total ="total";
    </script>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>

                    <th width="200" style="text-align: center">圖</th>
                    <th width="200" style="text-align: center">餐點名稱</th>
                    <th width="200" style="text-align: center">數量</th>
                    <th width="150" style="text-align: center">總價</th>
                    <th width="100" style="text-align: center">操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach($item as $de)
                    <form method="POST" action="/order/{{$de->order_id}}/item/{{$de->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <tr>

                            <td style="text-align: center"><img src="{{$de->meal->photo}}"width="80" height="40"></td>
                            <td style="text-align: center">{{$de->meal->name}}</td>
                            <td style="text-align: center">{{$de->quantity}}</td>
                            <td style="text-align: center">{{$de->meal->price*$de->quantity}}</td>
                            <td style="text-align: center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>我不要了
                                </button>

                            </td>


                        </tr>
                    </form>


                @endforeach

                        <form method="POST" action="/order/{{$de->order_id}}/confirm">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i>送出點單
                        </button>
                    </form>
                        　<input type="button" value="繼續點餐" onclick="location.href='/menu'">
                </tbody>

            </table >

        </div>
    </div>
</div>




</body>


</html>