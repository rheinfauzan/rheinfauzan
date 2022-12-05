<div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- form --}}
          <form>
            <input type="hidden" id="post_id">
            <div class="form-grub">
              <label for="namaSiswa">Nama</label>
              <input type="image" id="showNama" class="form-control" placeholder="Nama">
            </div>
          </form>
          <div class="form-grub">
            <label for="namaSiswa">Kelas</label>
            <input type="image" id="showKelas" class="form-control" placeholder="Kelas">
          </div>
        </form>
        <div class="form-grub">
          <label for="namaSiswa">NIM</label>
          <input type="image" id="showNim" class="form-control" placeholder="NIM">
        </div>
      </form>
          {{-- .form --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>