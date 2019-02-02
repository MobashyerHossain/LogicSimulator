<script>
  function createGate(name, id, img, height, width){
    var mousePos = stage.getPointerPosition();
    var x = (mousePos.x - (mousePos.x%10)) - 10;
    var y = (mousePos.y - (mousePos.y%10)) - 10;

    var imageObj = new Image();
    imageObj.onload = function() {
      var gateGroup = new Konva.Group({
          name: name+'Group'+id,
          x: x,
          y: y,
          draggable: true
      });

      gateGroup.on('click', function(){
        if(gateBorder.getAttr('visible') === false){
          gateBorder.setAttrs({
            visible: true
          });
          drawlayer.draw();
        }
        else{
          gateBorder.setAttrs({
            visible: false
          });
          drawlayer.draw();
        }
        if(choice === 'delete'){
          gateGroup.destroy();
          drawlayer.draw();
          document.body.style.cursor = 'default';
        }
      });

      // add cursor styling
      gateGroup.on('mouseover', function() {
          document.body.style.cursor = 'grab';
      });
      gateGroup.on('mouseout', function() {
          document.body.style.cursor = 'default';
      });
      gateGroup.on('mousedown touchstart', function () {
          document.body.style.cursor = 'grabbing';
      });
      gateGroup.on('mouseup touchend', function () {
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
          drawlayer.draw();
      });

      var gate = new Konva.Image({
        name: name+'Gate'+id,
        image: imageObj,
        width: width,
        height: height,
      });

      var gateBorder = new Konva.Rect({
          name: name+'GateBorder'+id,
          visible:false,
          width: width,
          height: height,
          stroke: 'gray',
          strokeWidth: 1,
          dash: [10, 5]
      });

      gateGroup.add(gate);
      gateGroup.add(gateBorder);

      drawlayer.add(gateGroup);
      drawlayer.draw();
    };
    imageObj.src = img;
  }
</script>
