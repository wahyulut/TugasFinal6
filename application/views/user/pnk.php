<form class="user" method="post" action="<?= base_url('user/pnk')?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="intergritas">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group col-md-6">
            <label for="intergritas">Intergritas</label>
            <input type="text" class="form-control" id="intergritas" name="intergritas">
        </div>
        <div class="form-group col-md-6">
            <label for="amanah">Amanah</label>
            <input type="text" class="form-control" id="amanah" name="amanah">
        </div>
        <div class="form-group col-md-6">
            <label for="cpk">CPK</label>
            <input type="text" class="form-control" id="cpk" name="cpk">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="profesional">Profesional</label>
            <input type="text" class="form-control" id="profesional" name="profesional">
        </div>
        <div class="form-group col-md-6">
            <label for="absensi">Absensi</label>
            <input type="text" class="form-control" id="absensi" name="absensi">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Tambah</button>
</form>