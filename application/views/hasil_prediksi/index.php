<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="py-3 d-flex justify-content-between text-light">
              <h3>Data Prediksi</h3>
              <a href="/hasil_prediksi/cetak" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <!-- <div class="form-inline py-3">
              <input type="number" class="form-control mr-3" id="periode">
              <button class="btn btn-success" onclick="prediksi()">Prediksi</button>
            </div> -->
        </div>
    </div>

    <div class="row" id="print">
        <div class="col-12 text-center py-5" id="text-print">
            <h2>Toko Serba ada, dan semua pasti ada</h2>
            <h4>Jln. Gatot Subroto, Gang Buntu, No.4</h4>
        </div>
        <div class="col-12">
            <table class="table table-striped bg-light">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Stok Awal</th>
                  <th>Stok Sisa</th>
                  <th>Jumlah Terjual</th>
                  <th>Forecasting</th>
                  <th>MAE</th>
                  <th>MAD</th>
                  <th>MSE</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $total_mad = 0;
                $total_mse = 0;
                foreach ($data as $key => $value): 
                  $mae = $value->jumlah_terjual-$value->MovingAverage;
                  $mad = abs($mae);
                  $mse = $mad*$mad;

                  $total_mad += $mad;
                  $total_mse += $mse;
                ?>
                <tr>
                  <td><?=++$key?></td>
                  <td><?=$value->bulan?></td>
                  <td><?=$value->tahun?></td>
                  <td><?=$value->stok_awal?></td>
                  <td><?=$value->stok_sisa?></td>
                  <td><?=$value->jumlah_terjual?></td>
                  <td><?=$value->MovingAverage ? $value->MovingAverage : 0?></td>
                  <td><?=$mae?></td>
                  <td><?=$mad?></td>
                  <td><?=$mse?></td>
                </tr>  
                <?php endforeach ?>
                <tr>
                  <td></td>
                  <td><b>Periode Selanjutnya</b></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?=$next_period[0]->sma ?></td>
                  <td></td>
                  <td><?= $total_mad / (count($data)-3) ?></td>
                  <td><?= $total_mse / (count($data)-3) ?></td>
                </tr> 
              </tbody>
            </table>

            <div class="text-light">
            <h4>Hasil Peramalan persediaan telur pada periode selanjutnya adalah <?=$next_period[0]->sma ?></h4>
            <h5>MAD : <?= $total_mad / (count($data)-3) ?></h5>
            <h5>MSE : <?= $total_mse / (count($data)-3) ?></h5>
            </div>
        </div>
    </div>

</div>

<script>

  var bulan = {
          1:"Januari",
          2:"Februari",
          3:"Maret",
          4:"April",
          5:"Mei",
          6:"Juni",
          7:"Juli",
          8:"Agustus",
          9:"September",
          10:"Oktober",
          11:"November",
          12:"Desember",
  }

  async function prediksi(){
    let periode = document.querySelector("#periode").value
    let tbody = document.querySelector("tbody")

    let hasilStokAwal = 0
    let hasilStokSisa = 0
    let hasilTerjual = 0
    let per = periode

    let res = await fetch("/trend_data/prediksi")
    let dataTrend = await res.json()
    

    let html = ""


    if(periode == 0){
      html = `<tr>
                  <td colspan="8" class="text-center">Tidak ada data!</td>
                </tr>`
    }

    let i = 0

    while(periode > 0){
      var data = dataTrend[periode-1]
      
      html += `<tr>
                  <th>${i+1}</th>
                  <td>${data.bulan}</td>
                  <td>${data.tahun}</td>
                  <td>${data.stok_awal}</td>
                  <td>${data.stok_sisa}</td>
                  <td>${data.jumlah_terjual}</td>
                  <td></td>
                </tr>`
      
      hasilStokAwal += parseInt(data.stok_awal)
      hasilStokSisa += parseInt(data.stok_sisa)
      hasilTerjual += parseInt(data.jumlah_terjual)
      
      if(periode == 1){
        html += `<tr class="bg-info">
                  <th>  <b> ${i+2}  </b>  </th>
                  <td>  <b> ${data.bulan_val > 11 ? bulan[1] : bulan[parseInt(data.bulan_val)+1]} </b> </td>
                  <td>  <b> ${data.tahun} </b>  </td>
                  <td>  <b> ${Math.ceil(hasilStokAwal /= per)} </b> </td>
                  <td>  <b> ${Math.ceil(hasilStokSisa /= per)} </b> </td>
                  <td>  <b> ${Math.ceil(hasilTerjual /= per)} </b> </td>
                  <td>  <button class="btn btn-success" onclick="window.print()">Cetak</button></td>
                </tr>`
      }

      periode--
      i++
    }

    tbody.innerHTML = html
    
  }

</script>
