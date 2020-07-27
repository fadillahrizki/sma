            <center>
            <h2>Toko Musdalifah Batu Empat</h2>
            <h4>Jln. Protokol Batu Empat, Kecamatan Aek Kuasan, Asahan, 21274</h4>

            <h3>Hasil Peramalan Persedian Telur</h3>
            </center>
            <hr>
            <table class="table table-striped bg-light" border="1" cellpadding="5" width="100%">
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

            <h4>Hasil Peramalan persediaan telur pada periode selanjutnya adalah <?=$next_period[0]->sma ?></h4>
            <h5>MAD : <?= $total_mad / (count($data)-3) ?></h5>
            <h5>MSE : <?= $total_mse / (count($data)-3) ?></h5>
            <script type="text/javascript">
            window.print()
            </script>