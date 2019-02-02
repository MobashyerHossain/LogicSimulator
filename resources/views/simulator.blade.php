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
    var ntg = 0;
    var ang = 0;
    var org = 0;

    $("input[name=choices]").change(function(){
        choice = $("input[name=choices]:checked").val();
        if(choice === 'default'){
          document.getElementById('selectImg').src = "{{url('storage/images/emptyImg.png')}}";
        }
        else if(choice === 'delete'){
          document.getElementById('selectImg').src = "{{url('storage/images/delete.png')}}";
        }
        else if(choice === 'notGate'){
          document.getElementById('selectImg').src = "{{url('storage/images/notGate.png')}}";
        }
        else if(choice === 'andGate'){
          document.getElementById('selectImg').src = "{{url('storage/images/andGate.png')}}";
        }
        else if(choice === 'orGate'){
          document.getElementById('selectImg').src = "{{url('storage/images/orGate.png')}}";
        }
        else if(choice === 'norGate'){
          document.getElementById('selectImg').src = "{{url('storage/images/norGate.png')}}";
        }
        else if(choice === 'nandGate'){
          document.getElementById('selectImg').src = "{{url('storage/images/nandGate.png')}}";
        }
        else if(choice === 'xorGate'){
          document.getElementById('selectImg').src = "{{url('storage/images/xorGate.png')}}";
        }
        else if(choice === 'xnorGate'){
          document.getElementById('selectImg').src = "{{url('storage/images/xnorGate.png')}}";
        }
    });

    </script>

    <script>
    var stage = new Konva.Stage({
        container: 'container',
        width: width,
        height: height,
    });

    @include('js.gridJS')

    var drawlayer = new Konva.Layer();

    stage.on('dblclick', function(){
      if(choice === 'notGate'){
        createGate('not', ++ntg, "{{url('storage/images/notGate.png')}}", 30, 50);
      }
      else if(choice === 'andGate'){
        createGate('and', ++ang, "{{url('storage/images/andGate.png')}}", 40, 60);
      }
      else if(choice === 'orGate'){
        createGate('or', ++org, "{{url('storage/images/orGate.png')}}", 40, 60);
      }
      else if(choice === 'norGate'){
        createGate('nor', ++org, "{{url('storage/images/norGate.png')}}", 40, 60);
      }
      else if(choice === 'nandGate'){
        createGate('nand', ++org, "{{url('storage/images/nandGate.png')}}", 40, 60);
      }
      else if(choice === 'xorGate'){
        createGate('xor', ++org, "{{url('storage/images/xorGate.png')}}", 40, 60);
      }
      else if(choice === 'xnorGate'){
        createGate('xnor', ++org, "{{url('storage/images/xnorGate.png')}}", 40, 60);
      }
    });
    stage.add(drawlayer);

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
  </script>
  @include('js.createJS')
@endsection
