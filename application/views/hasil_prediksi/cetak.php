            <center>
            <h2>Toko Musdalifah Batu Empat</h2>
            <h4>Jln. Protokol Batu Empat, Kecamatan Aek Kuasan, Asahan, 21274</h4>

            <h3>Hasil Peramalan Persedian Telur</h3>
            </center>
            <hr>
            <table width="100%" cellpadding="5" border="1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Stok Awal</th>
                  <th>Stok Sisa</th>
                  <th>Jumlah Terjual</th>
                  <th>Forecasting</th>
                  <!-- <th>MAE</th> -->
                  <th>MAD</th>
                  <th>MSE</th>
                  <th>MAPE</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $total_mad = 0;
                $total_mse = 0;
                $total_mape = 0;
                foreach ($data as $key => $value): 
                  $mae = 0;
                  $mad = 0;
                  $mse = 0;
                  $mape = 0;
                  if($key > 2)
                  {
                    $mae = $value->jumlah_terjual-$value->MovingAverage;
                    $mad = abs($mae);
                    $mse = $mad*$mad;
                    $mape = $mad/$value->jumlah_terjual*100;
                    $mape = round($mape,1);

                    $total_mad += $mad;
                    $total_mse += $mse;
                    $total_mape += $mape;
                  }
                ?>
                <tr>
                  <td><?=++$key?></td>
                  <td><?=$value->bulan?></td>
                  <td><?=$value->tahun?></td>
                  <td><?=$value->stok_awal?></td>
                  <td><?=$value->stok_sisa?></td>
                  <td><?=$value->jumlah_terjual?></td>
                  <td><?=$value->MovingAverage ? round($value->MovingAverage,1) : 0?></td>
                  <!-- <td><?=$mae?></td> -->
                  <td><?=$mad?></td>
                  <td><?=$mse?></td>
                  <td><?=$mape?></td>
                </tr>  
                <?php endforeach ?>
                <tr>
                  <td></td>
                  <td><b>Periode Selanjutnya</b></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?=round($next_period[0]->sma,1) ?></td>
                  <!-- <td></td> -->
                  <td><?= round($total_mad / (count($data)-3),1) ?></td>
                  <td><?= round($total_mse / (count($data)-3),1) ?></td>
                  <td><?= round($total_mape / (count($data)-3),1) ?></td>
                </tr> 
              </tbody>
            </table>

            <h4>Hasil Peramalan persediaan telur pada periode selanjutnya adalah <?=round($next_period[0]->sma,1) ?></h4>
            <h5>MAD : <?= round($total_mad / (count($data)-3),1) ?></h5>
            <h5>MSE : <?= round($total_mse / (count($data)-3),1) ?></h5>
            <h5>MAPE : <?= round($total_mape / (count($data)-3),1) ?></h5>
            <script type="text/javascript">
            window.print()
            </script>