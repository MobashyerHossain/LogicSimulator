<div class="accordion" id="accordionExample">
  <div class="card rounded-0 bg-secondary">
    <div class="card-header p-0" id="headingOne">
      <h5 class="mb-0">
        <button style="text-decoration: none" class="text-light btn btn-link collapsed p-2 m-0 w-100 text-left pl-4" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Wiring
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body p-2 ml-3 text-light">
        <div class="form-check">
          <input class="form-check-input default" type="radio" name="choices" id="default" value="default" checked>
          <label class="form-check-label w-100" for="default">
            default
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="delete" value="delete">
          <label class="form-check-label w-100" for="delete">
            delete
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="wire" value="wire">
          <label class="form-check-label w-100" for="wire">
            wire
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="card rounded-0 bg-secondary">
    <div class="card-header p-0" id="headingTwo">
      <h5 class="mb-0">
        <button style="text-decoration: none" class="text-light btn btn-link collapsed p-2 m-0 w-100 text-left pl-4" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Gates
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body p-2 ml-3 text-light">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="notGate" value="notGate">
          <label class="form-check-label w-100" for="notGate">
            NOT Gate
          </label>
        </div>
        <!--<div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="buffer" value="buffer">
          <label class="form-check-label w-100" for="buffer">
            Buffer
          </label>
        </div>-->
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="andGate" value="andGate">
          <label class="form-check-label w-100" for="andGate">
            AND Gate
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="orGate" value="orGate">
          <label class="form-check-label w-100" for="orGate">
            OR Gate
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="nandGate" value="nandGate">
          <label class="form-check-label w-100" for="nandGate">
            NAND Gate
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="norGate" value="norGate">
          <label class="form-check-label w-100" for="norGate">
            NOR Gate
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="xorGate" value="xorGate">
          <label class="form-check-label w-100" for="xorGate">
            XOR Gate
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="choices" id="xnorGate" value="xnorGate">
          <label class="form-check-label w-100" for="xnorGate">
            XNOR Gate
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="card rounded-0 bg-secondary">
    <div class="card-header p-0" id="headingThree">
      <h5 class="mb-0">
        <button style="text-decoration: none" class="text-light btn btn-link collapsed p-2 m-0 w-100 text-left pl-4" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Plexers
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body p-2 text-light">
      </div>
    </div>
  </div>
  <div id="buttons" class="p-2"><button id="save" class="btn btn-light w-100">Save as Image</button></div>
</div>
