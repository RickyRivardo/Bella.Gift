@extends('layouts.app')

@section('content')
<div class="container">

  <div class="col-md-12">
            <div class="card" style="border:none;background-color:#323232;">
                <div class="card-body">
                           @if(!empty($pesanan))
                     <p align="right" style="color:#fff">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <table class="table table-striped text-light">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
        <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr >
                                <td>{{ $no++ }}</td>
                          <td>
                                    <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                                </td>
                                <td style="color:#fff"> {{ $pesanan_detail->barang->nama_barang }}</td>
                                <td style="color:#fff">{{ $pesanan_detail->jumlah }} </td>
                                <td align="right" style="color:#fff">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td align="right" style="color:#fff">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
</tr>
@endforeach

    <tr>
                                <td  style="color:#fff" colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td  style="color:#fff" align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-primary" onclick="return confirm('Anda yakin akan Check Out ?');">
                                       Beli sekarang
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                       @endif

</div>
</div>


       
@endsection