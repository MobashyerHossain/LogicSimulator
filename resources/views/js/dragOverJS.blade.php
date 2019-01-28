stage.on("dragstart", function(e){
    e.target.moveTo(tempLayer);
    layer.draw();
});

var previousShape;

stage.on("dragmove", function(evt){
    var pos = stage.getPointerPosition();
    var shape = layer.getIntersection(pos);
    if (previousShape && shape) {
        if (previousShape !== shape) {
            // leave from old target
            previousShape.fire('dragleave', {
                type : 'dragleave',
                target : previousShape,
                evt : evt.evt
            }, true);

            // enter new targer
            shape.fire('dragenter', {
                type : 'dragenter',
                target : shape,
                evt : evt.evt
            }, true);
            previousShape = shape;
        } else {
            previousShape.fire('dragover', {
                type : 'dragover',
                target : previousShape,
                evt : evt.evt
            }, true);
        }
    } else if (!previousShape && shape) {
        previousShape = shape;
        shape.fire('dragenter', {
            type : 'dragenter',
            target : shape,
            evt : evt.evt
        }, true);
    } else if (previousShape && !shape) {
        previousShape.fire('dragleave', {
            type : 'dragleave',
            target : previousShape,
            evt : evt.evt
        }, true);
        previousShape = undefined;
    }
});

stage.on("dragend", function(e){
    var pos = stage.getPointerPosition();
    var shape = layer.getIntersection(pos);
    if (shape) {
        previousShape.fire('drop', {
            type : 'drop',
            target : previousShape,
            evt : e.evt
        }, true);
    }
    previousShape = undefined;
    e.target.moveTo(layer);
    layer.draw();
    tempLayer.draw();
});

stage.on("dragenter", function(e){
    layer.draw();
});

stage.on("dragleave", function(e){
    e.target.stroke('grey');
    layer.draw();
});

stage.on("dragover", function(e){
    e.target.stroke('red');
    layer.draw();
});

stage.on("drop", function(e){
    e.target.stroke('red');
    layer.draw();
});
