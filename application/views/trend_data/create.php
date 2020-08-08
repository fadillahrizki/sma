<?php 

$bulan = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
];

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>Tambah data Trend</h5>
                    <form action="/trend_data/insert" method="post">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control">
                                <?php foreach($bulan as $b): ?>   
                                    <option value="<?=$b?>"><?=$b?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" name="tahun" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="number" name="stok_awal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stok Sisa</label>
                            <input type="text" name="stok_sisa" value="0">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <hr>
                        <button class="btn btn-success">Tambah</button>
                        <a href="/trend_data" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>