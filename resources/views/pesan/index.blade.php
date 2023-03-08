@extends('layouts.app')

@section('content')
<div class="container">

        <div class="col-md-12 mt-1 text-light">
            <div class="card" style="background-color:#323232;border:none;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                     <img src="{{ url('uploads')}}/{{ $barang->gambar }}" class="card-img-top" style="height:400px"alt="...">
                        </div>
                        <div class="col-md-6 mt-5">
                           <div class="col-md-6 mt-5 text-light">
<h2 style="position:relative;bottom:100px;padding-left:20px;">{{ $barang->nama_barang}}</h2>
<h5 style="position:relative;bottom:80px;left:500px">Rp {{ $barang->harga }}</h5>
<h6 style="position:relative;bottom:80px;padding-left:20px;">{{ $barang->keterangan}}</h6>
                        
                            <table class="table text-light">
                                <tbody>
                                  
                                 
                                             <form method="post" action="{{ url('pesan') }}/{{ $barang->id }}" >
                                            @csrf
                                            <span style="position:relative;top:20px;background-color: #fff;border:solid;border-radius:50px;padding:10px 0px 10px 0px">
                                              <button style="border: none;background:none; "   onclick="decrement()">-</button>
                                        <input style="border: white none;background:none;text-align:center; " id=demoInput type=number min=1  name="jumlah_pesan" required="">


                                <button style="border:none;background:none;" onclick="increment()">+</button>
                                </span>
                                <p style="position:relative;top:25px;left:250px;">Only <span style="color:#9098B9">{{ number_format($barang->stok) }} </span>items left! <br>Dont miss it! </p>
                                <script>
                                function increment() {
                                    document.getElementById('demoInput').stepUp();
                                }
                                function decrement() {
                                    document.getElementById('demoInput').stepDown();
                                }
                                </script>
                                                 <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                            </form>
                                     
                                   
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection