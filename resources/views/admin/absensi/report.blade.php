<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report</title>
    <link rel="stylesheet" href="{{ url('public/assets/css/invoice.css') }}" media="all" />
  </head>
  <body background=null>
  <div class="background">
    <header class="clearfix">
      <h3>PRESENSI DOSEN NEGERI DIPERKERJAKAN(DPK)</h3>
      <h3>PADA UNIVERSITAS ISLAM INDONESIA BULAN 
        <?php
          $tgl = date_create($pegawai->tgl);
          $bulan = (int)date_format($tgl, "m");
          $tahun = date_format($tgl, "Y");
          echo $namaBulan[$bulan-1].' '.$tahun;
        ?>
      </h3>
      <div id="company" class="clearfix">
        <div><span>Prodi</span>:&nbsp;
        {{ $pegawai->Pegawai->program_studi }}
        </div>
        <div><span>Perguruan Tinggi</span>:&nbsp;
        Universitas Islam Indonesia
        </div>
        <div><span>Bulan</span>:&nbsp;
          <?php
            $tgl = date_create($nidn[0]->tgl);
            $bulan = (int)date_format($tgl, "m");
            $tahun = date_format($tgl, "Y");
            echo $namaBulan[$bulan-1].' '.$tahun;
          ?>
        </div>
      </div>
      <div id="project">
        <div><span>Nama</span> :&nbsp;
                {{ $pegawai->Pegawai->name }}
        </div>
        <div><span>NIP</span> :&nbsp;
                {{ $pegawai->Pegawai->nidn }}
        </div>
        <div><span>NIDN</span> :&nbsp;
                {{ $pegawai->Pegawai->nidn }}
        </div>
        <div><span>Pangkat/Golongan</span> :&nbsp;
                {{ $pegawai->Pegawai->pangkat }}
        </div>
        <div><span>Jabatan Fungsional</span> :&nbsp;
             {{ $pegawai->Pegawai->jabatan }}
        </div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service" rowspan="2">No</th>
            <th class="desc" rowspan="2">Hari</th>
            <th rowspan="2">Tanggal</th>
            <th rowspan="2">Jam Kerja</th>
            <th colspan="2">Jam</th>
            <th colspan="4">Tanda Tangan</th>
            <th class="keterangan" rowspan="2">Ket</th>
          </tr>
          <tr>
            <th>Datang</th>
            <th>Pulang</th>
            <th colspan="2">Datang</th>
            <th colspan="2">Pulang</th>
          </tr>
        </thead>
        <tbody>
        @for($i = 1; $i <= $hadir[0]->days; $i++)
          <tr>
            <td class="service">
            	{{ $i }}
            </td>
            <td class="desc">
                <?php
                  $hari = date("l", mktime(0,0,0,$nidn[0]->bulan,$i,$nidn[0]->tahun));
                  echo $hari;
                ?>
            </td>
            <td class="unit">               
                <?php
                  $tgl = date("d-M-Y", mktime(0,0,0,$nidn[0]->bulan,$i,$nidn[0]->tahun));
                  echo $tgl;
                ?>
            </td>
            <td class="qty">
                07:00 - 17:00
            </td>
            <td>
                <?php
                  $tgl = date("Y-m-d", mktime(0,0,0,$nidn[0]->bulan,$i,$nidn[0]->tahun));
                  $hari = date("l", mktime(0,0,0,$nidn[0]->bulan,$i,$nidn[0]->tahun));
                  foreach($libur as $liburs){
                    $tglLibur = $liburs->date;
                    if($tglLibur == $tgl || $hari == "Sunday"){
                      echo "Libur";
                      break;
                    } else {
                      $cekHari = "Aktif";
                    }
                  }
                  if($cekHari = "Aktif"){
                    $cekHari = null;
                    foreach($data as $row){
                      $tglAbsen = $row->tgl;
                      if($tgl == $tglAbsen){
                        if($row->jam_masuk != null) {
                          $time = date("H:i", strtotime($row->jam_masuk));
                          echo $time;
                          break;
                        } else {
                          echo "-";
                        }
                      }
                    }
                  }
                ?>
            </td>
            <td> 
                <?php
                  $tgl = date("Y-m-d", mktime(0,0,0,$nidn[0]->bulan,$i,$nidn[0]->tahun));
                  $hari = date("l", mktime(0,0,0,$nidn[0]->bulan,$i,$nidn[0]->tahun));
                  foreach($libur as $liburs){
                    $tglLibur = $liburs->date;
                    if($tglLibur == $tgl || $hari == "Sunday"){
                      echo "Libur";
                      break;
                    } else {
                      $cekHari = "Aktif";
                    }
                  }
                  if($cekHari = "Aktif"){
                    $cekHari = null;
                    foreach($data as $row){
                      $tglAbsen = $row->tgl;
                      if($tgl == $tglAbsen){
                        if($row->jam_keluar != null) {
                          $time = date("H:i", strtotime($row->jam_keluar));
                          echo $time;
                          break;
                        } else {
                          echo "-";
                        }
                      }
                    }
                  }
                ?>
            </td>
            @if($i % 2 == 0)
                  <td class="datang"></td>
                  <td class="pulang">{{ $i }}</td>
                  <td class="datang"></td>
                  <td class="pulang">{{ $i }}</td>
                  <td class="keterangan">   </td>
            @else
            <td class="datang">{{ $i }}</td>
            <td class="pulang"></td>
            <td class="datang">{{ $i }}</td>
            <td class="pulang"></td>
            <td class="keterangan">   </td>
            @endif
          </tr>
          @endfor
        </tbody>
      </table>
      <div id="notices">
        <table class="notes" width="100%" border="0">
          <tr>
            <td>Jumlah kehadiran {{ $hadir[0]->masuk }} hari</td>
            <td width="190px">Yogyakarta,&nbsp; __________________</td>
          </tr>
        </table>
        <table width="100%" border="0" class="notes">
          <tr>
            <td>
              <table width="100%" border="0" class="notes">
                <tr>
                  <td width="20px">*)</td>
                  <td colspan="2">Ket. Istirahat</td>
                </tr>
                <tr>
                  <td></td>
                  <td width="130px">- Senin s/d Kamis</td>
                  <td>: 12.00 - 13.00</td>
                </tr>
                <tr>
                  <td></td>
                  <td width="130px">- Jumat</td>
                  <td>: 11.30 - 13.00</td>
                </tr>
              </table>
              <table width="100%" border="0" class="notes">
                @foreach($hariLibur as $row)
                <tr>
                  <td width="120px" class="tgl-libur">
                    <?php
                      $tgl = date_create($row->date);
                      $hari = date_format($tgl, "d");
                      $bulan = (int)date_format($tgl, "m");
                      $tahun = date_format($tgl, "Y");
                      echo $hari.' '.ucfirst(strtolower($namaBulan[$bulan-1])).' '.$tahun;
                    ?>
                  </td>
                  <td>: {{ $row->summary }}</td>
                </tr>
                @endforeach
              </table>
            </td>
            <td width="25%" class="tertanda">
              <div>
                Pimpinan PTS
                <br><br><br><br><br>........................................
              </div>
            </td>
            <td width="25%" class="tertanda">
              <div>
                Urusan Daftar Hadir
                <br><br><br><br><br>........................................
              </div>
            </td>
          </tr>
        </table>
      </div>
    </main>
    <footer >
    </footer>
  </div>
  </body>
</html>