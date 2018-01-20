@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" id="parent">
  </div>
</div>  
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('home')}}">
        <i class="large material-icons">home</i>
    </a>
</div>

@endsection

@section('footer')

<script type="text/javascript">
    $.ajax({
        url:"{{route('ajaxGetDataUndian')}}",
        dataType:'json',
        success:function(result) {
            console.log(result);
            var data = result.data;
            var allhtml = '';
            for(var i=0;i<data.length;i++){
                var status = "Idle";
                if(data[i].status==2){
                    status = "In Progress";
                }else if(data[i].status==3){
                    status = "Completed";
                }
                var running_status = "Idle";
                var running_click = "start";
                var running_caption = "Start";
                var addons = "";
                if(data[i].running_status==2){
                    running_status = "Running";
                    running_click = "stop";
                    running_caption = "Stop";
                }else if(data[i].running_status==3){
                    running_status = "Completed";
                    running_click = "winner_status";
                    running_caption = "Winner Status";
                    addons = '<a onclick="win('+data[i].id+')">Win</a>';
                    addons += '<a onclick="loss('+data[i].id+')">Loss</a>';
                }
                var html = '<div class="col m12 s12 l12" id="child_'+data[i].id+'">';
                    html +='<div class="card blue-grey darken-1">';
                    html +='<div class="card-content white-text">';
                    html +='<span class="card-title">'+data[i].name+'</span>';
                    html +='<p>Status : '+status+'</p>';
                    html +='<p id="status">Running Status : '+running_status+'</p>';
                    html +='</div>';
                    html +='<div class="card-action" id="action">';
                    html +='<a onclick="'+running_click+'('+data[i].id+')">'+running_caption+'</a>';
                    html +=addons;
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';

                    allhtml+=html;

            }    
            $("#parent").html(allhtml);
        }
    });
    function start(id) {
        $.ajax({
            url:'{{route("ajaxStartUndian")}}/'+id,
            dataType:'json',
            success:function(result) {
                    updatenonRunning(result);
            }
        });
    }
    function stop(id) {
        $.ajax({
            url:'{{route("ajaxStopUndian")}}/'+id,
            dataType:'json',
            success:function(result) {
                updatenonRunning(result);
            }
        });
    }

    function updatenonRunning(result) {
        var status = "Idle";
        var data = result.data;
        if(result.data.status==2){
            status = "In Progress";
        }else if(result.data.status==3){
            status = "Completed";
        }
        var running_status = "Idle";
        var running_click = "start";
        var running_caption = "Start";
        var addons = "";
        if(data.running_status==2){
            running_status = "Running";
            running_click = "stop";
            running_caption = "Stop";
        }else if(data.running_status==3){
            running_status = "Completed";
            running_click = "winner_status";
            running_caption = "Winner Status";
            addons = '<a onclick="win('+data.id+')">Win</a>';
            addons += '<a onclick="loss('+data.id+')">Loss</a>';
        }
        var html ='<div class="card blue-grey darken-1">';
        html +='<div class="card-content white-text">';
        html +='<span class="card-title">'+result.data.name+'</span>';
        html +='<p>Status : '+status+'</p>';
        html +='<p id="status">Running Status : '+running_status+'</p>';
        html +='</div>';
        html +='<div class="card-action" id="action">';
        html +='<a onclick="'+running_click+'('+data.id+')">'+running_caption+'</a>';
        html += addons;
        html +='</div>';
        html +='</div>';

        $("#child_"+result.data.id).html(html);
    }

    var mainFunction = function() {
        $.ajax({
            url:'{{route("ajaxGetDataUndian")}}',
            dataType:'json',
            success:function(result) {
                for(var i=0;i<result.data.length;i++){
                    var data = result.data[i];
                    var status = "Idle";
                    if(data.status==2){
                        status = "In Progress";
                    }else if(data.status==3){
                        status = "Completed";
                    }
                    var running_status = "Idle";
                    var running_click = "start";
                    var running_caption = "Start";
                    var addons = "";
                    if(data.running_status==2){
                        running_status = "Running";
                        running_click = "stop";
                        running_caption = "Stop";
                    }else if(data.running_status==3){
                        running_status = "Completed";
                        running_click = "winner_status";
                        running_caption = "Winner Status";
                        addons = '<a onclick="win('+data.id+')">Win</a>';
                        addons += '<a onclick="loss('+data.id+')">Loss</a>';
                    }
                    var text = $("#child_"+data.id+" #status").html();
                    if(text.indexOf("Running Status : Running")>-1
                        || text.indexOf("Running Status : Idle")>-1){
                        var html ='<div class="card blue-grey darken-1">';
                        html +='<div class="card-content white-text">';
                        html +='<span class="card-title">'+data.name+'</span>';
                        html +='<p>Status : '+status+'</p>';
                        html +='<p id="status">Running Status : '+running_status+'</p>';
                        html +='</div>';
                        html +='<div class="card-action" id="action">';
                        html +='<a onclick="'+running_click+'('+data.id+')">'+running_caption+'</a>';
                        html += addons;
                        html +='</div>';
                        html +='</div>';

                        $("#child_"+data.id).html(html);
                    }
                }
            }
        });
    }

    var main = setInterval(mainFunction,1000);

    function winner_status(id) {
        clearInterval(main);
    }

    function win(id) {
        $.ajax({
            url:'{{route("ajaxWin")}}/'+id,
            dataType:'json',
            success:function(result) {
                updatenonRunning(result);
            }
        })
    }

    function loss(id) {
        $.ajax({
            url:'{{route("ajaxLoss")}}/'+id,
            dataType:'json',
            success:function(result) {
                updatenonRunning(result);
            }
        })
    }
</script>

@endsection