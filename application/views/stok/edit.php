<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>Edit data Stok</h5>
                    <form action="/stok/update" method="post">
                        <input type="hidden" name="id" value="<?=$stok->id?>">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" value="<?=$stok->jumlah?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?=$stok->tanggal?>" required>
                        </div>
                        <hr>
                        <button class="btn btn-success">Edit</button>
                        <a href="/stok" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>