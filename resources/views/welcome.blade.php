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
<body style="overflow: hidden;" id="body">
<div style="z-index:-9;opacity:1;position:absolute;top:0;left:0;right:0;bottom:0;background: url({{\App\Configuration::where('key','background')->first()->content}}) no-repeat 0px 0px;"></div>
    <img id="loss_image" style="z-index:999999;opacity:0;position: absolute;top: 50%;left: 50%;width: 500px;height: 300px;margin-top: -150px;margin-left: -250px;" src="{{url('images/loss.png')}}">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{route('home')}}">
            <i class="large material-icons">home</i>
        </a>
    </div>
    <div class="main" >  
        <h1 id="title" style="margin: 0;padding: 0;color:{{isset(\App\Configuration::where('key','warna_teks_nama_event')->first()->content)?\App\Configuration::where('key','warna_teks_nama_event')->first()->content:'#ffffff'}};font-size: {{isset(\App\Configuration::where('key','ukuran_teks_nama_event')->first()->content)?\App\Configuration::where('key','ukuran_teks_nama_event')->first()->content:'60'}}pt;">{{isset(\App\Configuration::where('key','nama_event')->first()->content)?\App\Configuration::where('key','nama_event')->first()->content:'&nbsp;'}}</h1>
        <div id="hadiah" style="font-family:'Verdana';color:{{isset(\App\Configuration::where('key','warna_teks_hadiah')->first()->content)?\App\Configuration::where('key','warna_teks_hadiah')->first()->content:'#00ffff'}};font-size: {{isset(\App\Configuration::where('key','ukuran_teks_hadiah')->first()->content)?\App\Configuration::where('key','ukuran_teks_hadiah')->first()->content:'30'}}pt;font-weight:bold;margin: 0;padding: 0;text-align: center;width: 100%;">{{isset(\App\HadiahUndian::where('active',1)->first()->hadiah)?\App\HadiahUndian::where('active',1)->first()->hadiah:'&nbsp;'}}</div>
        <div class="w3_agile_main_grids">
            <div class="countdown agile">
                <div class="countdown-time agileits_w3layouts" style="background: {{isset(\App\Configuration::where('key','warna_background_nomor_undian')->first()->content)?\App\Configuration::where('key','warna_background_nomor_undian')->first()->content:'#ffffff'}};">
                    <ul class="clearfix w3_agileits" id="js-countDown">
                        <li class="item"><i class="day" style="color:{{isset(\App\Configuration::where('key','warna_teks_nomor_undian')->first()->content)?\App\Configuration::where('key','warna_teks_nomor_undian')->first()->content:'#333333'}};font-size:{{isset(\App\Configuration::where('key','ukuran_teks_nomor_undian')->first()->content)?\App\Configuration::where('key','ukuran_teks_nomor_undian')->first()->content:'100'}}pt;" id="code">00000000000</i></li>
                    </ul>
                </div>
            </div>
            <div class="agileits_newsletter">
                <h2 id="name" style="opacity: 0;color:{{isset(\App\Configuration::where('key','warna_teks_nama_pemenang')->first()->content)?\App\Configuration::where('key','warna_teks_nama_pemenang')->first()->content:'#00ffff'}};font-size: {{isset(\App\Configuration::where('key','ukuran_teks_nama_pemenang')->first()->content)?\App\Configuration::where('key','ukuran_teks_nama_pemenang')->first()->content:'50'}}pt;">&nbsp;</h2>
                <h3 id="level" style="opacity: 0;color:{{isset(\App\Configuration::where('key','warna_teks_jabatan_pemenang')->first()->content)?\App\Configuration::where('key','warna_teks_jabatan_pemenang')->first()->content:'#ffe269'}};font-size: {{isset(\App\Configuration::where('key','ukuran_teks_jabatan_pemenang')->first()->content)?\App\Configuration::where('key','ukuran_teks_jabatan_pemenang')->first()->content:'30'}}pt;">&nbsp;</h3>
                <div class="form">
                        
                    <button id="start" onclick="undi()">UNDI</button>  
                </div>
            </div>
        </div>
    </div>
    <button id="startConfetti" style="opacity: 0;"></button>
    <button id="stopConfetti" style="opacity: 0;"></button>
    <button id="restartConfetti" style="opacity: 0;"></button>
    <button id="initConfetti" style="opacity: 0;"></button>
    <script src="{{url('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{url('js/jquery.confetti.js')}}"></script>

    <script type="text/javascript">
        var activeSession = '';
        var pesertaUndian = '';
        var hadiah_id = '';
        var hadiah_name = '';
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
        var second,third,win_status = '';
        var last_played_status = '';
        var clear_canvas;
        var count = 0;

        function undi() {
            if($("#start").html()=="UNDI"){
                winnerID = '';
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

                            // $("#title").html(name);

                            if($("#title").html()!=name){
                                fadeOutIn('title',name);
                            }
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
                                hadiah_id = result.hadiah.id;
                                hadiah_name = result.hadiah.hadiah;
                                
                                if(result.last_history=='win'){
                                    if(win_status=='' && winnerID != ''){
                                        win_status = 'win';
                                        $("#startConfetti").click();
                                        console.log('winplay');
                                        var audiowin = new Audio('{{(isset(\App\Configuration::where('key','win_effect')->first()->content)?\App\Configuration::where('key','win_effect')->first()->content:url("audio/win.mp3"))}}');
                                        audiowin.play();
                                    }
                                }else if(result.last_history=='loss'){
                                    if(win_status=='' && winnerID != ''){
                                        fadeIn('loss_image');
                                        console.log('lossplay');
                                        win_status = 'loss';
                                        var audioloss = new Audio('{{(isset(\App\Configuration::where('key','loss_effect')->first()->content)?\App\Configuration::where('key','loss_effect')->first()->content:url("audio/loss.mp3"))}}');
                                        audioloss.play();
                                    }
                                }

                                if($("#hadiah").html()!=hadiah_name){
                                    fadeOutIn('hadiah',hadiah_name);
                                }
                            }
                        }); 
                    }else if(running_status==2){
                        if($("#name").css('opacity')==1){
                            winnerID = '';
                            win_status = '';
                            $("#code").html("00000000000");
                            testAnim('fadeOut');
                        }else{
                            running();
                        }
                    }else if(running_status==4){
                        count++;
                        if(count>5){
                            if($("#name").css('opacity')==1){

                                if($("#loss_image").css('opacity')==1){
                                    fadeOut('loss_image');
                                }
                                $("#stopConfetti").click();
                                // $("#confettiCanvas").remove();
                                // $("#initConfetti").click();
                            }
                            $.ajax({
                                url:'{{route("ajaxResetToReset")}}/'+activeSession,
                                dataType:'json',
                                success:function(result) {
                                    running_status = 5;
                                }
                            });
                        }
                    }else if(running_status==5){
                        $.ajax({
                            url:'{{route("ajaxGetRunningStatus")}}/'+activeSession,
                            dataType:'json',
                            success:function(result) {
                                console.log(result);
                                running_status = result.data;
                            }
                        }); 
                    }else if(running_status==6){
                        $.ajax({
                            url:'{{route("ajaxResetToIdle")}}/'+activeSession,
                            dataType:'json',
                            success:function(result) {
                                // console.log(result);
                                fadeOutReload('body');
                            }
                        }); 
                    }
                }
            }
        }
        $(document).on('ready',function() {
            main = setInterval(mainFunction,1000);

            // setTimeout(function() {
            //     fadeInFast("body");
            // },500);
        });


        function checkRunningStatus() {
            $.ajax({
                url:'{{route("ajaxGetRunningStatus")}}/'+activeSession,
                dataType:'json',
                success:function(result) {
                    running_status = result.data;
                    hadiah_id = result.hadiah.id;
                    hadiah_name = result.hadiah.hadiah;

                    if($("#hadiah").html()!=hadiah_name){
                        fadeOutIn('hadiah',hadiah_name);
                    }
                }
            }); 
        }

        function running() {

            var audiorunning = new Audio('{{(isset(\App\Configuration::where('key','play_effect')->first()->content)?\App\Configuration::where('key','play_effect')->first()->content:url("audio/running.mp3"))}}');

            if (typeof audiorunning.loop == 'boolean')
            {
                audiorunning.loop = true;
            }
            else
            {
                audiorunning.addEventListener('ended', function() {
                    this.currentTime = 0;
                    if(running_status==2){
                        this.play();
                    }
                }, false);
            }
            audiorunning.play();
            $("#start").html('STOP');
            clearInterval(main);
            checkRunningFunction = setInterval(checkRunningStatus,1000);
            second = setInterval(function() {
                    if(times<duration && running_status==2 && stops=='auto'){
                        console.log(times);
                        times++;
                    }
            },1000);
            third = setInterval(function() {
                if(times<duration && running_status==2  && stops=='auto' || running_status==2  && stops=='manual'){
                    id_s = getRandomInt(0,pesertaUndian.length-1);
                    console.log(pesertaUndian[id_s].id);
                    $("#code").html(pesertaUndian[id_s].code);
                }else if(times>duration && running_status==3  && stops=='auto'  || running_status==3  && stops=='manual'){
                    if(winnerName==''){
                        audiorunning.pause();
                        audiorunning.currentTime = 0;
                    // console.log(pesertaUndian[id_s].id);
                    // console.log(winnerID);
                        showWinner();
                    // console.log(winnerID);
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
        function fadeOutIn(id,text) {
            $('#'+id).removeClass().addClass('fadeOut animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                // $(this).removeClass();
                $("#"+id).html(text);
                $('#'+id).removeClass().addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    // $(this).removeClass();
                });
            });
        };
        function fadeIn(id) {
            $('#'+id).removeClass().addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            });
        };
        function fadeInFast(id) {
            // $('#'+id).removeClass().addClass('fadeIn animatedfast').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            // });
        };
        function fadeOut(id) {
            $('#'+id).removeClass().addClass('fadeOut animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            });
        };
        function fadeOutReload(id) {
            // $('#'+id).removeClass().addClass('fadeOut animatedfast').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                window.location.reload();
            // });
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
                    winnerID = pesertaUndian[id_s].id;
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