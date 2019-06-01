@foreach($order as $o)

@endforeach

@if ($order->status == '已結帳')
    <?php
    $url = "/checkout/successful";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
    ?>
@endif