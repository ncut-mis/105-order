

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>

                    <th width="200" style="text-align: center">圖</th>
                    <th width="200" style="text-align: center">數量</th>
                    <th width="150" style="text-align: center">價格</th>
                    <th width="100" style="text-align: center">操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach($item as $de)
                    <form method="POST" action="/order/{{$de->order_id}}/item/{{$de->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <tr>

                            <td style="text-align: center"><img src="{{url('img/meal/'.$de->meal->photo)}}"width="80" height="40"></td>



                            <td style="text-align: center">{{$de->meal->name}}</td>
                            <td style="text-align: center">{{$de->quantity}}</td>
                            <td style="text-align: center">{{$de->meal->price}}</td>
                            <td style="text-align: center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i>我不要了
                                </button>

                            </td>


                        </tr>
                    </form>


                @endforeach



            </table >

        </div>
    </div>
</div>
