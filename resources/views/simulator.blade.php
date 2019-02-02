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
    stage.add(drawlayer);
  </script>
@endsection
