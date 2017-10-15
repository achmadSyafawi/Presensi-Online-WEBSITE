<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>INVOICE</title>
    <link rel="stylesheet" href="{{ url('public/assets/css/invoice.css') }}" media="all" />
  </head>
  <body background="{{ url('public/assets/img/img.png') }}">
  <div class="background">
    <header class="clearfix">
      <div id="logo">
        <!--<img src="{{ url('public/assets/img/img.jpg') }}" style="border-radius: 70%;" >-->
      </div>
      <h1>INVOICE LABAIKKA CATERING</h1>
      <div id="company" class="clearfix">
        <div>LOKASI ACARA</div>
        <div>
                @if(count($invoice) > 0)
            	   {{ $invoice[0]->Transaksi->venue }}
            	@endif
        </div>
      </div>
      <div id="project">
        <div><span>NAMA CUSTOMER</span> 
                @if(count($invoice) > 0)
            	   {{ $invoice[0]->Transaksi->Customer->nama }}
            	@endif</div>
        <div><span>ALAMAT</span> 
                @if(count($invoice) > 0)
            	   {{ $invoice[0]->Transaksi->Customer->alamat }}
            	@endif</div>
        <div><span>NO TELP</span> 
                @if(count($invoice) > 0)
            	   {{ $invoice[0]->Transaksi->Customer->no_telp }}
            	@endif
        </div>
        <div><span>TANGGAL PEMESANAN</span>
             <?php
                if(count($invoice) > 0){
            	    
                        $date=date_create($invoice[0]->Transaksi->created_at);
                        echo date_format($date,"d M Y");
                }
             ?> 
                
        </div>
        <div><span>TANGGAL DIGUNAKAN</span> 
             <?php
                if(count($invoice) > 0){	    
                        $date=date_create($invoice[0]->Transaksi->due_date);
                        echo date_format($date,"d M Y");
                }
             ?>
        </div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PAKET</th>
            <th class="desc">DESKRIPSI</th>
            <th>HARGA</th>
            <th>JUMLAH</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        @foreach($invoice as $key =>$row)
          <tr>
            <td class="service">
               
            	   {{ $row->Paket->name }}
            	
            </td>
            <td class="desc">
                @foreach($row->Paket->Paket_detail as $det =>$detail)
            	   - {{ $detail->Item->name }}<br>
                @endforeach
            </td>
            <td class="unit">
               
            	   Rp {{ $row->Paket->harga }},00
            	
            </td>
            <td class="qty">
                
            	   {{ $row->qty }}
            	
            </td>
            <td class="total">
               Rp <?php 
                     $total = $row->Paket->harga * $row->qty;
                     echo $total;
                ?>,00
            </td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">
                @if(count($invoice) > 0)
            	   Rp {{ $invoice[0]->Transaksi->total }},00
            	@endif
                
            </td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>CATATAN:</div>
        <div class="notice">Perubahan pesanan hanya dapat dilayani 3 hari sebelum hari H</div>
      </div>
    </main>
    <footer>
      <center>LABBAIKA CATERING</center>
    </footer>
  </div>
  </body>
</html>