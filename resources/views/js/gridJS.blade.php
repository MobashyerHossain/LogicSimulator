var grid = new Konva.Layer();

for(var lw=0; lw<width; lw=lw+10){
  var line = new Konva.Line({
      points: [lw, 0, lw, height],
      stroke: 'lightgrey',
      strokeWidth: 1,
  });

  grid.add(line);
}

for(var lh=0; lh<height; lh=lh+10){
  var line = new Konva.Line({
      points: [0, lh, width, lh],
      stroke: 'lightgrey',
      strokeWidth: 1,
  });

  grid.add(line);
}

for(var lw=0; lw<width; lw=(lw+60)){
  var line = new Konva.Line({
      points: [lw, 0, lw, height],
      stroke: 'lightgrey',
      strokeWidth: 1,
  });

  grid.add(line);
}

for(var lh=0; lh<height; lh=(lh+60)){
  var line = new Konva.Line({
      points: [0, lh, width, lh],
      stroke: 'lightgrey',
      strokeWidth: 1,
  });

  grid.add(line);
}

stage.add(grid);
