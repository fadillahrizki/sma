<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>Edit data Petugas : <?=$petugas->nama_lengkap?></h5>
                    <form action="/petugas/update" method="post">
                        <input type="hidden" name="id" value="<?=$petugas->id?>">
                        <input type="hidden" name="pengguna_id" value="<?=$petugas->pengguna_id?>">
                        <input type="hidden" name="level" value="petugas">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="<?=$petugas->nama_lengkap?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= $petugas->username ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="<?= $petugas->password ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" name="no_hp" value="<?= $petugas->no_hp ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <?php if($petugas->jenis_kelamin == 'Laki - Laki'): ?>
                                    <option value="Laki - Laki" selected>Laki - Laki</option>
                                <?php else: ?>
                                    <option value="Perempuan" selected>Perempuan</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control"><?=$petugas->alamat?></textarea>
                        </div>
                        <hr>
                        <button class="btn btn-success">Edit</button>
                        <a href="/petugas" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>