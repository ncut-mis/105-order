<html>
<head>
    <title>ajax-testing</title>
</head>
<body>
<div id="one">One</div>
<div id="auto"></div>
<div id="three">Three</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready( function(){
        $('#auto').load('ajaxdata');
        refresh();
    });

    function refresh()
    {
        setTimeout( function() {
            $('#auto').load('ajaxdata');
            refresh();
        }, 2000);
    }
</script>
</body>
</html>

