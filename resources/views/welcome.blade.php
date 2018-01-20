<html>
<head>
<title>Doorprize</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{url('css/materialize.min.css')}}"  media="screen,projection"/>
<link href="{{url('css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
</head>
<body>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{route('home')}}">
            <i class="large material-icons">home</i>
        </a>
    </div>
    <div class="main">  
        <h1 id="title">DOORPRIZE</h1>
        <div class="w3_agile_main_grids">
            <div class="countdown agile">
                <div class="countdown-time agileits_w3layouts" style="background: #fff;color: #333;">
                    <ul class="clearfix w3_agileits" id="js-countDown" style="color: #333;">
                        <li class="item"><i class="day" id="code">00000000000</i></li>
                    </ul>
                </div>
            </div>
            <div class="agileits_newsletter">
                <h2 id="name" style="opacity: 0">Seno Willbert</h2>
                <h3 id="level" style="opacity: 0">Marketing Communication Department</h3>
                <div class="form">
                        
                    <button id="start" onclick="undi()">UNDI</button>  
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('js/jquery-1.12.4.min.js')}}"></script>

    <script type="text/javascript">
        var activeSession = '';
        var pesertaUndian = '';
        var duration = 0;
        var running_status = 1;
        var stops = '';
        var name = '';
        var max_running = 0;
        var running_times = 0;
        var winnerNumber = '';
        var winnerName = '';
        var winnerID = '';
        var id_s = -1;
        var times = 0;
        var main = '';
        var checkRunningFunction = '';
        var second,third;

        function undi() {
            if($("#start").html()=="UNDI"){
                $.ajax({
                    url:'{{route("ajaxStartUndian")}}/'+activeSession,
                    dataType:'json',
                    success:function(result) {
                        $("#start").html('STOP');
                    }
                });
            }else if($("#start").html()=="STOP"){
                $.ajax({
                    url:'{{route("ajaxStopUndian")}}/'+activeSession,
                    dataType:'json',
                    success:function(result) {
                        $("#start").html('UNDI');
                    }
                });
            }
        }
        var mainFunction = function() {
            if(activeSession==''){
                $.ajax({
                    url:'{{route("ajaxGetUndian")}}',
                    dataType:'json',
                    success:function(result) {
                        console.log(result.data);
                        if(result.data!=null){
                            activeSession = result.data.id;
                            duration = result.data.duration;
                            name = result.data.name;
                            max_running = result.data.max_running;
                            stops = result.data.stops;

                            $("#title").html(name);
                        }
                    }
                });
            }else{
                if(pesertaUndian==''){
                    $.ajax({
                        url:'{{route("ajaxGetPesertaUndian")}}/'+activeSession,
                        dataType:'json',
                        success:function(result) {
                            pesertaUndian = result.data;
                            console.log(result);
                        }
                    }); 
                }else{
                    if(running_status==1 || running_status==3){
                        $.ajax({
                            url:'{{route("ajaxGetRunningStatus")}}/'+activeSession,
                            dataType:'json',
                            success:function(result) {
                                console.log(result);
                                running_status = result.data;
                            }
                        }); 
                    }else if(running_status==2){
                        if($("#name").css('opacity')==1){
                            $("#code").html("00000000000");
                            testAnim('fadeOut');
                        }
                        running();
                    }
                }
            }
        }

        main = setInterval(mainFunction,500);

        function checkRunningStatus() {
            $.ajax({
                url:'{{route("ajaxGetRunningStatus")}}/'+activeSession,
                dataType:'json',
                success:function(result) {
                    running_status = result.data;
                }
            }); 
        }

        function running() {
            $("#start").html('STOP');
            clearInterval(main);
            checkRunningFunction = setInterval(checkRunningStatus,1000);
            second = setInterval(function() {
                    if(times<duration && running_status==2){
                        console.log(times);
                        times++;
                    }
            },1000);
            third = setInterval(function() {
                if(times<duration && running_status==2){
                    id_s = getRandomInt(0,pesertaUndian.length-1);
                    $("#code").html(pesertaUndian[id_s].code);
                }else{
                    if(winnerName==''){
                        showWinner();
                    }
                }
            },10);
        }
        function testAnim(x) {
            $('#name').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                // $(this).removeClass();
                $('#level').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    // $(this).removeClass();
                });
            });
        };
        function showWinner() {

            $("#start").html('UNDI');
            clearInterval(checkRunningFunction);
            clearInterval(second);
            clearInterval(third);
            $.ajax({
                url:'{{route("ajaxStopRunningUndian")}}/'+activeSession+'/'+pesertaUndian[id_s].id,
                dataType:'json',
                success:function(result) {
                    winnerName = pesertaUndian[id_s].name;
                    winnerNumber = pesertaUndian[id_s].code;
                    $("#code").html(pesertaUndian[id_s].code);
                    $("#name").html(pesertaUndian[id_s].name);
                    $("#level").html(pesertaUndian[id_s].position);
                    testAnim('bounceIn');
                    winnerName='';
                    id_s = -1;
                    times = 0;
                    activeSession = '';
                    pesertaUndian = '';
                    running_status = 1;

                    main = setInterval(mainFunction,1000);
                }
            }); 
            
        }

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    </script>
</body>
</html>