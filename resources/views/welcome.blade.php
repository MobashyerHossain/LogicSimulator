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
      <div class="row ml-5 mr-5">
        <div class="col-2">
          <form>
            <input type="radio" name="choices" id="choices" value="default" checked> Default<br>
            <input type="radio" name="choices" id="choices" value="notGate"> Not Gate<br>
            <input type="radio" name="choices" id="choices" value="andGate"> And Gate<br>
            <input type="radio" name="choices" id="choices" value="orGate"> Or Gate<br>
          </form>
        </div>
        <div class="col-9">
          <div id="gridbox" style="margin: auto; width: 100%; overflow-y: scroll; height:400px;">
            <div id="container"></div>
          </div>
        </div>
      </div>



      <script>
        var width = document.getElementById('gridbox').offsetWidth*5;
        var height = document.getElementById('gridbox').offsetHeight*5;

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

        var box = new Konva.Rect({
            name:'sampleBox',
            x: 20,
            y: 20,
            width: 20,
            height: 30,
            stroke: 'gray',
            strokeWidth: 1,
            dash: [10, 5]
        });

        // add cursor styling
        box.on('mouseover', function() {
            document.body.style.cursor = 'pointer';
            this.stroke('darkgrey');
            this.strokeWidth(3);
            layer.draw();
        });
        box.on('mouseout', function() {
            document.body.style.cursor = 'default';
            this.stroke('grey');
            this.strokeWidth(1);
            layer.draw();
        });
        layer.add(box);

        var i=0;
        box.on('click', function () {
            i++;
            var b = new Konva.Rect({
                name:'newBox'+i,
                x:100,
                y:10,
                width: 40,
                height: 50,
                stroke: 'gray',
                strokeWidth: 1,
                dash: [10, 5]
            });

            // add cursor styling
            b.on('mouseover', function() {
                document.body.style.cursor = 'grab';
                this.stroke('darkgrey');
                this.strokeWidth(3);
                layer.draw();
            });
            b.on('mouseout', function() {
                document.body.style.cursor = 'default';
                this.stroke('grey');
                this.strokeWidth(1);
                layer.draw();
            });
            b.on('mousedown touchstart', function () {
                document.body.style.cursor = 'grabbing';
            });
            b.on('mouseup touchend', function () {
                document.body.style.cursor = 'grab';
            });

            var con = new Konva.Line({
              points: [100+20, 10+50, 100+20, 10+60],
              stroke: 'darkgrey',
              strokeWidth: 2
            });

            var g = new Konva.Group({
                draggable:true,
            });

            g.add(b);
            g.add(con);

            layer.add(g);
            layer.draw();

        });
        stage.on('click', function(e){
            //alert(choice);
            var mousePos = stage.getPointerPosition();
            var x = (mousePos.x - (mousePos.x%10)) - 20;
            var y = (mousePos.y - (mousePos.y%10)) - 20;

            if(choice === 'notGate'){
                var b = new Konva.Rect({
                    name:'newBox'+i,
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
                b.on('mouseover', function() {
                    document.body.style.cursor = 'grab';
                    this.stroke('darkgrey');
                    this.strokeWidth(3);
                    layer.draw();
                });
                b.on('mouseout', function() {
                    document.body.style.cursor = 'default';
                    this.stroke('grey');
                    this.strokeWidth(1);
                    layer.draw();
                });
                b.on('mousedown touchstart', function () {
                    document.body.style.cursor = 'grabbing';
                });
                b.on('mouseup touchend', function (e) {
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

                layer.add(b);
                layer.draw();
            }
        });

        stage.add(layer);

        var tempLayer = new Konva.Layer();
        stage.add(tempLayer);

        stage.on('click tap', function (e) {
          // if click on empty area - remove all transformers
          if (e.target === stage) {
            stage.find('Transformer').destroy();
            layer.draw();
            return;
          }
          // do nothing if clicked NOT on our rectangles
          if (!e.target.hasName('newBox1')) {
            return;
          }
          // remove old transformers
          // TODO: we can skip it if current rect is already selected
          stage.find('Transformer').destroy();

          // create new transformer
          var tr = new Konva.Transformer();
          layer.add(tr);
          tr.attachTo(e.target);
          layer.draw();
        })

        @include('js.dragOverJS')
      </script>
    </body>
</html>
