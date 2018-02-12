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
            var hadiah = result.hadiah;
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
                    running_caption = "Status";
                    addons = '<a class="btn btn-large blue darken-2" onclick="win('+data[i].id+')">Win</a>';
                    addons += '<a class="right btn btn-large red darken-1" onclick="loss('+data[i].id+')">Loss</a>';
                }else if(data[i].running_status==4){
                    running_status = "Waiting Reset";
                    running_click = "waiting_reset";
                    running_caption = "Waiting";
                }else if(data[i].running_status==5){
                    running_status = "Reset";
                    running_click = "reset";
                    running_caption = "Next";
                }
                var html = '<div class="col m12 s12 l12" id="child_'+data[i].id+'">';
                    html +='<div class="card blue-grey darken-1">';
                    html +='<div class="card-content white-text">';
                    html +='<span class="card-title">'+data[i].name+'</span>';
                    html +='<p id="status">Status : '+status+'</p>';
                    html +='<p id="status_running">Running Status : '+running_status+'</p>';
                    html +='</div>';
                    html +='<div id="active_hadiah">';
                    html +='<div class="card-action">';
                    html +='<label for="hadiah">Hadiah</label>';
                    html +='<select class="white-text" id="hadiah_'+data[i].id+'">';
                    html +='<option value="0">NONE</option>';
                    for(var j=0;j<hadiah.length;j++){
                        html +='<option '+(hadiah[j].active==1?'selected':'')+' value="'+hadiah[j].id+'">'+hadiah[j].hadiah+'</option>';
                    }   
                    html +='</select>';
                    html +='</div>';
                    html +='</div>';
                    html +='<div class="card-action" id="action">';
                    html +='<a class="amber black-text btn-large" style="height:200px;width:100%;font-size:50pt;font-weight:bold;line-height:200px;" onclick="'+running_click+'('+data[i].id+')">'+running_caption+'</a>';
                    html +='</div>';
                    html +='<div id="action_button">';
                    if(addons!=""){
                        html +='<div class="card-action">';
                        html +=addons;
                        html +='</div>';
                    }
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';

                    allhtml+=html;


            }    
            $("#parent").html(allhtml);
            $('select').material_select();
            for(var i=0;i<data.length;i++){
                var ids = data[i].id;
                $("#hadiah_"+data[i].id).on('change',function(e) {
                    // console.log(e.target.value);
                    activateHadiah(e.target.value,ids);
                });
            }
        }
    });
    function activateHadiah(id,id_undian) {
        $.ajax({
            url:'{{route("ajaxActivateHadiah")}}/'+id+'/'+id_undian,
            dataType:'json',
            success:function(result) {
            }
        });
    }
    function start(id) {
        $.ajax({
            url:'{{route("ajaxStartUndian")}}/'+id,
            dataType:'json',
            success:function(result) {
                    updatenonRunning(result.data);
            }
        });
    }
    function stop(id) {
        $.ajax({
            url:'{{route("ajaxStopUndian")}}/'+id,
            dataType:'json',
            success:function(result) {
                updatenonRunning(result.data);
            }
        });
    }

    function updatenonRunning(result) {
        var status = "Idle";
        var data = result;
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
            running_caption = "Status";
            addons = '<a class="btn btn-large blue darken-2" onclick="win('+data.id+')">Win</a>';
            addons += '<a class="right btn btn-large red darken-1" onclick="loss('+data.id+')">Loss</a>';
        }else if(data.running_status==4){
            running_status = "Waiting Reset";
            running_click = "waiting_reset";
            running_caption = "Waiting";
        }else if(data.running_status==5){
            running_status = "Reset";
            running_click = "reset";
            running_caption = "Next";
        }
        // var html ='<div class="card blue-grey darken-1">';
        // html +='<div class="card-content white-text">';
        // html +='<span class="card-title">'+data.name+'</span>';

        var status = 'Status : '+status;
        var status_running = 'Running Status : '+running_status;
        // html +='</div>';
        // html +='<div class="card-action" id="action">';
        var action ='<a class="amber black-text btn-large" style="height:200px;width:100%;font-size:50pt;font-weight:bold;line-height:200px;" onclick="'+running_click+'('+data.id+')">'+running_caption+'</a>';
        // html +='</div>';
        var action_button = '';
        if(addons!=""){
            action_button = '<div class="card-action">';
            action_button += addons;
            action_button += '</div>';
        }
        // html +='</div>';

        $("#child_"+data.id+" #status").html(status);
        $("#child_"+data.id+" #action_button").html(action_button);
        if($("#child_"+data.id+" #status_running").html()!=status_running){
            $("#child_"+data.id+" #action").html(action);
            $("#child_"+data.id+" #status_running").html(status_running);
        }
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
                        running_caption = "Status";
                        addons = '<a onclick="win('+data.id+')">Win</a>';
                        addons += '<a onclick="loss('+data.id+')">Loss</a>';
                    }else if(data.running_status==4){
                        running_status = "Waiting Reset";
                        running_click = "waiting_reset";
                        running_caption = "Waiting Reset";
                    }else if(data.running_status==5){
                        running_status = "Reset";
                        running_click = "reset";
                        running_caption = "Next";
                    }
                    var text = $("#child_"+data.id+" #status_running").html();
                    if(text.indexOf("Running Status : Running")>-1
                        || text.indexOf("Running Status : Idle")>-1
                        || text.indexOf("Running Status : Reset")>-1
                        || text.indexOf("Running Status : Waiting Reset")>-1){
                        updatenonRunning(result.data[i]);
                        // var html ='<div class="card blue-grey darken-1">';
                        // html +='<div class="card-content white-text">';
                        // html +='<span class="card-title">'+data.name+'</span>';
                        // html +='<p>Status : '+status+'</p>';
                        // html +='<p id="status">Running Status : '+running_status+'</p>';
                        // html +='</div>';
                        // html +='<div class="card-action" id="action">';
                        // html +='<a onclick="'+running_click+'('+data.id+')">'+running_caption+'</a>';
                        // html +='</div>';
                        // html += addons;
                        // html +='</div>';

                        // $("#child_"+data.id).html(html);
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
                updatenonRunning(result.data);
            }
        })
    }

    function reset(id) {
        $.ajax({
            url:'{{route("ajaxReset")}}/'+id,
            dataType:'json',
            success:function(result) {
                updatenonRunning(result.data);
            }
        })
    }

    function loss(id) {
        $.ajax({
            url:'{{route("ajaxLoss")}}/'+id,
            dataType:'json',
            success:function(result) {
                updatenonRunning(result.data);
            }
        })
    }
</script>

@endsection