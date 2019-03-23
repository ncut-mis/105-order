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


<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>

                    <th width="200" style="text-align: center">圖</th>
                    <th width="200" style="text-align: center">餐點名稱</th>
                    <th width="200" style="text-align: center">數量</th>
                    <th width="100" style="text-align: center">價錢</th>
                    <th width="70" style="text-align: center">操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach($detail as $de)
                    <form method="POST" action="/order/{{$de->order_id}}/item/{{$de->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <tr>

                            <td style="text-align: center"><img src="{{$de->photo}}"width="80" height="40"></td>
                            <td style="text-align: center">{{$de->name}}</td>
                            <td style="text-align: center">{{$de->quantity}}</td>
                            <td style="text-align: center">{{$de->price}}*{{$de->quantity}}</td>
                            <td style="text-align: center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>我不要了
                                </button>

                            </td>


                        </tr>
                    </form>


                @endforeach

                </tbody>

            </table >
        </div>
    </div>
</div>




</body>


</html>