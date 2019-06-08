@php
    $total=0;

@endphp
@foreach($item as $de)
    @php
        $total=$total+$de->meal->price;
    @endphp
@endforeach

<div class="mu-title">
    <span class="mu-subtitle">您的點單</span><br><br>
    <form method="POST" action="/order/{{$de->order_id}}/confirm">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="total" value=" {{$total}}">
        <button type="submit" class="btn btn-success">
            <i ></i>送出餐點
        </button>

    </form>
</div>

<div class="mu-reservation-content">




    <div class="col-md-12">
        <div class="mu-reservation-right">
            <div class="mu-opening-hour">
                <h2>ITEM</h2>


<form method="POST" action="/order/{{$de->order_id}}/item/{{$de->id}}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <ul class="list-unstyled">
        @foreach($item as $de)
            <li>
                <p><font size="3" face="微軟正黑體">{{$de->meal->name}} X {{$de->quantity}}   &nbsp  ${{$de->meal->price*$de->quantity}}</font>   <button type="submit" class="btn btn-danger">
                        <i class="fa fa-minus"></i> 我不要了
                    </button></p>

            </li>

        @endforeach
        <HR  >
        <li>
            <p><font size="6" face="微軟正黑體">總價 {{$total}}</font></p>

        </li>
    </ul>
</form>

                </div>
                </div>
                </div>
                </div>