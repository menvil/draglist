<!DOCTYPE html>
<html>
    <head>
        <title>List of items</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/my.css">
        <script type="text/javascript" src="js/my.js"></script>
        <script>
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } });
        </script>

    </head>
    <body>
        <div class="container">
            <div class="content">
                {!! Form::open(['id'=>'form']) !!}
                    {!! Form::text('item', '', ['id'=>'name', 'placeholder'=>'input here...']) !!}
                    {!! Form::submit('Add') !!}
                {!! Form::close() !!}
                <ol id="sortable">
                    @foreach ($items as $key=>$item)
                        <li id="item-{{$item->id}}">{{$item->name}} <span id="{{$item->id}}" class="padder">&#10005;</span></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </body>
</html>
