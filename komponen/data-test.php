<!-- Button trigger modal -->
<!-- <div style="display: flex; justify-content: space-between;">
      <h4 class="mb-4 fw-bolder">Hitung Data</h4>
      <button type="button" class="btn btn-info mb-5" data-bs-toggle="modal" data-bs-target="#HitungData" style="font-size: 14px;">
       Hitung
      </button>
     <button <a class="btn btn-info mb-5" style="font-size: 14px;" href="index.php">Reset</a> </button>
    </div> -->
<!-- <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#HitungData" style="font-size: 14px;">
  Hitung
</button> -->

<!-- Modal -->
<div class="modal fade" id="HitungData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="HitungDataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">

    <form action="index.php?opsi=hitung" method="POST">

      <div class="modal-content px-3">
        <div class="modal-header">
          <h5 class="modal-title" id="HitungDataLabel">Data Tes dan Nilai K</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="form-group mb-1 d-flex align-items-center">
            <label for="x2" class="mb-2 col-3 pt-2 pb-2">Nilai x2</label>

            <input name="x2" id="x2"  class="form-control bg-light" type="number">
          </div>

          <div class="form-group mb-1 d-flex align-items-center">
            <label for="y2" class="mb-2 col-3 pt-2 pb-2">Nilai y2</label>

            <input name="y2" id="y2"  class="form-control bg-light" type="number">
          </div>

          <div class="form-group mb-1 d-flex align-items-center">
            <label for="K" class="mb-2 col-3 pt-2 pb-2">Nilai K</label>

            <input name="K" id="K"  class="form-control bg-light" type="number">
          </div>

        </div>
        <div class="modal-footer justify-content-center">

          <input type="submit" name="submit" value="Hitung" class="btn btn-info text-white col-11 p-2">

        </div>
      </div>

    </form>

  </div>
</div>
