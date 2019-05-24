
@foreach($item as $de)
    <form method="POST" action="/order/{{$de->order_id}}/item/{{$de->id}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}



        <li>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="{{url('img/meal/'.$de->meal->photo)}}" alt="img">
                    </a>
                </div>
                <div class="media-body">
                    <div class="col-md-7">
                        <h4 class="media-heading"><a><font face="微軟正黑體">{{$meal->name}}</font></a></h4>
                        <span class="mu-menu-price">${{$meal->price}}</span>
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i>我要這個
                        </button><br><br>
                    </div>

                    <div>
                        <font face="微軟正黑體">{{$meal->ingredients}}</font>
                    </div>
                </div>

            </div>
            <hr class="style-one" />
        </li>

    </form>
@endforeach