@php
    $total=0;

@endphp
@foreach($item as $de)
    @php
        $total=$total+$de->meal->price;
    @endphp
@endforeach
<form method="POST" action="/order/{{$de->order_id}}/item/{{$de->id}}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <ul class="list-unstyled">
        @foreach($item as $de)
            <li>
                <p><font size="4" face="微軟正黑體">{{$de->meal->name}} X {{$de->quantity}} &nbsp  ${{$de->meal->price*$de->quantity}}</font>   <button type="submit" class="btn btn-danger">
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