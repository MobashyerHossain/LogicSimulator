<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <meta name="description" content="Online simulator for logic circuits">
        <meta name="author" content="LSG">
        <link rel="icon" type="image/png" href="{{ asset('storage/images/devil.ico') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Logic Simulator</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://unpkg.com/konva@2.4.2/konva.min.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
      @include('navbar')

      <main class="py-0 mt-0">
          @yield('content')
      </main>
      
      @yield('script')
      <!--<div class="row ml-5 mr-5">
        <div class="col-2">
          <form>
            <input type="radio" name="choices" id="choices" value="default" checked> Default<br>
            <input type="radio" name="choices" id="choices" value="notGate"> Not Gate<br>
            <input type="radio" name="choices" id="choices" value="andGate"> And Gate<br>
            <input type="radio" name="choices" id="choices" value="orGate"> Or Gate<br>
            <input type="radio" name="choices" id="choices" value="line"> Line<br>
            <input type="radio" name="choices" id="choices" value="eraser"> Eraser<br>
          </form>
          <div id="buttons"><button id="save">Save as Image</button></div>
        </div>
        <div class="col-9">
          <div id="gridbox" style="margin: auto; width: 100%; overflow-y: scroll; height:400px;">
            <div id="container"></div>
          </div>
        </div>
      </div>



      <script>
        var width = document.getElementById('gridbox').offsetWidth;
        var height = document.getElementById('gridbox').offsetHeight;
        var linebool = false;
        var choice;

        $("input[name=choices]").change(function(){
            choice = $("#choices:checked").val();
        });

        var stage = new Konva.Stage({
            container: 'container',
            width: width,
            height: height,
        });

        @include('js.gridJS')

        var layer = new Konva.Layer();

        var ng = 0;
        var ag = 0;
        var og = 0;
        var ln = 0;

        stage.on('click', function(e){
            //alert(choice);
            var mousePos = stage.getPointerPosition();
            var x = (mousePos.x - (mousePos.x%10)) - 20;
            var y = (mousePos.y - (mousePos.y%10)) - 20;

            if(choice === 'notGate'){
                ng++;
                var notgate = new Konva.Rect({
                    name:'notGate'+ng,
                    x:x,
                    y:y,
                    width: 40,
                    height: 50,
                    stroke: 'gray',
                    strokeWidth: 1,
                    draggable:true,
                    dash: [10, 5]
                });

                // add cursor styling
                notgate.on('mouseover', function() {
                    document.body.style.cursor = 'grab';
                    this.stroke('darkgrey');
                    this.strokeWidth(3);
                    layer.draw();
                });
                notgate.on('mouseout', function() {
                    document.body.style.cursor = 'default';
                    this.stroke('grey');
                    this.strokeWidth(1);
                    layer.draw();
                });
                notgate.on('mousedown touchstart', function () {
                    document.body.style.cursor = 'grabbing';
                });
                notgate.on('mouseup touchend', function () {
                    document.body.style.cursor = 'grab';
                    var newPos = stage.getPointerPosition();

                    var newX = (this.getAttr('x') - (this.getAttr('x')%10));
                    var newY = (this.getAttr('y') - (this.getAttr('y')%10));

                    if(this.getAttr('x')%10 > 5){
                      var newX = ((this.getAttr('x')+10) - (this.getAttr('x')%10));
                    }
                    if(this.getAttr('y')%10 > 5){
                      var newY = ((this.getAttr('y')+10) - (this.getAttr('y')%10));
                    }

                    this.setAttrs({
                      x:newX,
                      y:newY
                    });
                });

                layer.add(notgate);
                layer.draw();
            }

            if(choice === 'andGate'){
                ag++;
                var andgate = new Konva.Rect({
                    name:'andGate'+ag,
                    x:x,
                    y:y,
                    width: 40,
                    height: 50,
                    stroke: 'blue',
                    strokeWidth: 1,
                    draggable:true,
                    dash: [10, 5]
                });

                // add cursor styling
                andgate.on('mouseover', function() {
                    document.body.style.cursor = 'grab';
                    this.stroke('darkblue');
                    this.strokeWidth(3);
                    layer.draw();
                });
                andgate.on('mouseout', function() {
                    document.body.style.cursor = 'default';
                    this.stroke('blue');
                    this.strokeWidth(1);
                    layer.draw();
                });
                andgate.on('mousedown touchstart', function () {
                    document.body.style.cursor = 'grabbing';
                });
                andgate.on('mouseup touchend', function () {
                    document.body.style.cursor = 'grab';
                    var newPos = stage.getPointerPosition();

                    var newX = (this.getAttr('x') - (this.getAttr('x')%10));
                    var newY = (this.getAttr('y') - (this.getAttr('y')%10));

                    if(this.getAttr('x')%10 > 5){
                      var newX = ((this.getAttr('x')+10) - (this.getAttr('x')%10));
                    }
                    if(this.getAttr('y')%10 > 5){
                      var newY = ((this.getAttr('y')+10) - (this.getAttr('y')%10));
                    }

                    this.setAttrs({
                      x:newX,
                      y:newY
                    });
                });
                andgate.on('click', function(){
                  if(andtr.getAttr('visible') === false){
                    andtr.setAttrs({
                      visible:true
                    })
                  }
                  else {
                    andtr.setAttrs({
                      visible:false
                    })
                  }
                  layer.draw();
                })
                andgate.on('dragstart', function() {
                  andtr.setAttrs({
                    visible:false
                  })
                  layer.draw();
                });

                var andtr = new Konva.Transformer({
                  visible:false,
                  rotationSnaps: [0, 90, 180, 270],
                  resizeEnabled: false
                });
                layer.add(andtr);
                andtr.attachTo(andgate);

                layer.add(andgate);
                layer.draw();
            }

            if(choice === 'line'){
              if(linebool === false){
                ln++;
                var startPos = stage.getPointerPosition();
                var linestartx = startPos.x;
                var linestarty = startPos.y;
                var lineendx = startPos.x;
                var lineendy = startPos.y;

                var wire = new Konva.Line({
                  name: 'wire'+ln,
                  points: [linestartx, linestarty, lineendx, lineendy],
                  dash: [15, 5],
                  stroke: 'red',
                  draggable:true,
                  strokeWidth: 2
                });


                wire.on('mouseover', function() {
                    document.body.style.cursor = 'grab';
                });
                wire.on('mouseout', function() {
                    document.body.style.cursor = 'default';
                });
                wire.on('mousedown touchstart', function () {
                    document.body.style.cursor = 'grabbing';
                });
                wire.on('mouseup touchend', function () {
                  document.body.style.cursor = 'grab';
                  var newPos = stage.getPointerPosition();

                  var newX = (this.getAttr('x') - (this.getAttr('x')%10));
                  var newY = (this.getAttr('y') - (this.getAttr('y')%10));

                  if(this.getAttr('x')%10 > 5){
                    var newX = ((this.getAttr('x')+10) - (this.getAttr('x')%10));
                  }
                  if(this.getAttr('y')%10 > 5){
                    var newY = ((this.getAttr('y')+10) - (this.getAttr('y')%10));
                  }

                  this.setAttrs({
                    x:newX,
                    y:newY
                  });
                });

                stage.on('mousemove', function (){
                  var endPos = stage.getPointerPosition();
                  var lineendx = endPos.x;
                  var lineendy = endPos.y;

                  if(linestartx%10 < 5){
                    linestartx = linestartx - linestartx%10;
                    linestarty = linestarty - linestarty%10;
                  }
                  else{
                    linestartx = linestartx + (10 - (linestartx%10));
                    linestarty = linestarty + (10 - (linestarty%10));
                  }
                  if(lineendx%10 < 5){
                    lineendx = lineendx - lineendx%10;
                    lineendy = lineendy - lineendy%10;
                  }
                  else{
                    lineendx = lineendx + (10 - (lineendx%10));
                    lineendy = lineendy + (10 - (lineendy%10));
                  }

                  wire.setAttrs({
                    points: [linestartx, linestarty, linestartx, lineendy, lineendx, lineendy]
                  });

                  layer.add(wire);
                  layer.draw();
                });
                linebool = true;
              }
              else{
                stage.off('mousemove');
                linebool = false;
              }
            }
        });

        stage.add(layer);

        var tempLayer = new Konva.Layer();
        stage.add(tempLayer);

        @include('js.dragOverJS')

        function downloadURI(uri, name) {
          var link = document.createElement('a');
          link.download = name;
          link.href = uri;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          delete link;
        }

        document.getElementById('save').addEventListener('click', function() {
            var dataURL = stage.toDataURL({ pixelRatio: 3 });
            downloadURI(dataURL, 'stage.png');
          }, false
        );
      </script>-->
    </body>
</html>
