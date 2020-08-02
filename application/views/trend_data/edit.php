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
                    <h5>Edit data Trend</h5>
                    <form action="/trend_data/update" method="post">
                        <input type="hidden" name="id" value="<?=$trend_data->id?>">
                        <input type="hidden" name="stok_sisa" value="0">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control">
                                <?php foreach($bulan as $b): ?>   
                                    <?php if($trend_data->bulan == $b): ?> 
                                        <option value="<?=$b?>" selected><?=$b?></option>
                                    <?php else: ?>
                                        <option value="<?=$b?>"><?=$b?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" name="tahun" value="<?=$trend_data->tahun?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="number" name="stok_awal" value="<?=$trend_data->stok_awal?>" class="form-control" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Stok Sisa</label>
                            <input type="number" name="stok_sisa" value="<?=$trend_data->stok_sisa?>" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="<?=$trend_data->tanggal?>" class="form-control" required>
                        </div>
                        <hr>
                        <button class="btn btn-success">Edit</button>
                        <a href="/trend_data" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>