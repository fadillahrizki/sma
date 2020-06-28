<div class="container" >
    <div class="row">
        <div class="col-12">
            <div class="py-3 d-flex justify-content-between text-light">
              <h3>Data Stok</h3>
              <a href="/stok/create" class="btn btn-success">
                <svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                  <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                </svg>
                Tambah Data
              </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            
            <?php if(isset($this->session->successCreate)): ?>
              <div class="alert alert-success">Berhasil Menambah Data Stok</div>
            <?php unset($_SESSION['successCreate']);endif; ?>
            
            <?php if(isset($this->session->successUpdate)): ?>
              <div class="alert alert-success">Berhasil Mengedit Data Stok</div>
            <?php unset($_SESSION['successUpdate']);endif; ?>
            
            <?php if(isset($this->session->successDelete)): ?>
              <div class="alert alert-success">Berhasil Menghapus Data Stok</div>
            <?php unset($_SESSION['successDelete']);endif; ?>
            
            <table class="table table-striped bg-light">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!count($data)): ?>
                  <tr>
                    <td colspan="4" class="text-center">Tidak ada data!</td>
                  </tr>
                <?php endif ?>
                <?php $no=1; foreach($data as $stok): ?>
                  <tr>
                    <th><?=$no?></th>
                    <td><?=$stok->jumlah?></td>
                    <td><?=$stok->tanggal?></td>
                    <td>
                      <a href="/stok/edit?id=<?=$stok->id?>" class="btn btn-warning btn-sm">
                        <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Edit
                      </a>
                      <a href="/stok/delete?id=<?=$stok->id?>" class="btn btn-danger btn-sm">
                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        Hapus
                      </a>
                    </td>
                  </tr>
                <?php $no++; endforeach; ?>
              </tbody>
            </table>
        </div>
    </div>

</div>
