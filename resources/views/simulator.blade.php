@extends('welcome')

@section('content')
  <div class="row m-0 p-0">
    <div class="col-2 bg-dark p-2">
      @include('leftSidebar')

    </div>
    <div class="col-8 p-0">
      <div id="gridbox" style="margin: auto; width: 100%; height:400px;">
        <div id="container"></div>
      </div>
    </div>
    <div class="col-2 bg-dark p-2">
      @include('rightSidebar')
    </div>
  </div>
@endsection

@section('script')
  <script>
    var width = document.getElementById('gridbox').offsetWidth;
    var height = document.getElementById('gridbox').offsetHeight;
    var choice = 'default';
    var ng =0;

    $(document).on('click', '[name="choices"]', function () {
        choice = $(this).val();
    });

    var stage = new Konva.Stage({
        container: 'container',
        width: width,
        height: height,
    });

    @include('js.gridJS')

    var drawlayer = new Konva.Layer();

    $(document).on('click', '[name="choices"]', function () {
        if(choice === 'notGate'){
          stage.on('click tap', function(){
            var mousePos = stage.getPointerPosition();
            var x = (mousePos.x - (mousePos.x%10)) - 10;
            var y = (mousePos.y - (mousePos.y%10)) - 10;
            ng++;

            var imageObj = new Image();
            imageObj.onload = function() {
              var notgate = new Konva.Image({
                name: 'notGate'+ng,
                x: x,
                y: y,
                image: imageObj,
                width: 60,
                height: 30,
                draggable: true
              });

              drawlayer.add(notgate);
              drawlayer.draw();
            };
            imageObj.src = "{{url('storage/images/notGate.png')}}";
          });
        }
    });
    stage.add(drawlayer);
  </script>
@endsection
