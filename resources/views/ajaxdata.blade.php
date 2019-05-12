
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
                    <h4 class="media-heading"><a href="#">{{$de->meal->name}}</a></h4>
                    <span class="mu-menu-price">數量: {{$de->quantity}} | ${{$de->meal->price*$de->quantity}}</span>
                    <br>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-minus"></i>我不要了
                    </button>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>


                </div>

            </div>

        </li>

    </form>
@endforeach