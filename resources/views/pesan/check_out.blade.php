@include('sweetalert::alert')
@extends('layouts.app')

<style>
.flip-box {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: none;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-box-front {
  background-color: #bbb;
  color: black;
}

/* Style the back side */
.flip-box-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
}
</style>

@section('content')

<div class="container">

  <div class="col-md-12">
            <div class="card" style="border:none;background-color:#323232;">
                <div class="card-body">
                           @if(!empty($pesanan))
                     <p align="right" style="color:#fff">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                                           <table class="table table-hover table-dark">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Item</th></th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Total Harga</th>
                                                    <th scope="col">Aksi<th>
                                                    </tr>
                                                </thead>
                                                <tbody>

            
        <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)

                                   

                            <tr >
                                <td>{{ $no++ }}</td>
                          <td>
                            <div class="flip-box">
                                        <div class="flip-box-inner">
                                            <div class="flip-box-front" style="width:200px;height:200px">
                                             
     <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" style="width:200px;height:200px" alt="...">
</a>
                                       
                                            </div>
                                            <div class="flip-box-back" style="width:200px;height:200px" >
                                {{  QrCode::size(200)->generate(  $pesanan_detail->barang->nama_barang  ) }}
                                            </div>
                                        </div>
                                        </div>
                                                                         
                                </td>
                                <td style="color:#fff"> {{ $pesanan_detail->barang->nama_barang }}</td>
                               
     <td style="color:#fff">{{ $pesanan_detail->alamat }} </td>
<td style="color:#fff">{{ $pesanan_detail->jumlah }} </td>
                               
                                <td align="right" style="color:#fff">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td align="right" style="color:#fff">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                             <td align="right" style="color:#fff">Rp. {{ ($pesanan_detail->catatan) }}</td>
                                
                                <td>
                                    <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                    
                                      </form>
                                        <a href="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" download= "{{ $pesanan_detail->barang->nama_barang }}"><i class="fa fa-gift  fa-2x " aria-hidden="true" style="color:#9098B9;"></i></a>
                                         
                                  
                                </td>
</tr>
@endforeach

    <tr>
                                <td  style="color:#fff" colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td  style="color:#fff" align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn text-light" style="background-color:#9098B9;border-radius:30px"onclick="return confirm('Anda yakin akan Check Out ?');">
                              Kirim
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                 

                       @endif
               
</div>

</div>



       
@endsection