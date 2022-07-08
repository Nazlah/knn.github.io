<!-- Button trigger modal -->
<div style="display: flex; justify-content: space-between;">
<h4 class="mb-4 fw-bolder">Data Awal</h4>
<button type="button" class="btn btn-info mb-5" data-bs-toggle="modal" data-bs-target="#TambahData" style="font-size: 14px;">
  Tambah Data
</button>
</div>


<!-- Modal -->
<div class="modal fade" id="TambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="TambahDataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">

    <form action="index.php?opsi=input" method="POST">

      <div class="modal-content px-3">
        <div class="modal-header">
          <h5 class="modal-title" id="TambahDataLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="form-group mb-1 d-flex align-items-center">
            <label for="x1" class="mb-2 col-3 pt-2 pb-2">Nilai X1</label>

            <input name="x1" id="x1"  class="form-control bg-light" type="number">
          </div>

          <div class="form-group mb-1 d-flex align-items-center">
            <label for="y1" class="mb-2 col-3 pt-2 pb-2">Nilai Y1</label>

            <input name="y1" id="y1"  class="form-control bg-light" type="number">
          </div>

          <div class="form-group mb-1 d-flex align-items-center">
            <label for="class" class="mb-2 col-3 pt-2 pb-2">Data Type</label>

             <select id="tumbuh" class="form-control bg-light" name="tumbuh" required>
                <option value="">- Pilih</option>
                <option value="Cepat">Cepat</option>
                <option value="Lambat">Lambat</option>
              </select>
          </div>

        </div>
        <div class="modal-footer justify-content-center">

          <input type="submit" name="submit" value="Simpan" class="btn btn-info text-white col-11 p-2">

        </div>
      </div>

    </form>

  </div>
</div>
