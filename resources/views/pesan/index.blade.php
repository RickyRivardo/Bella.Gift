@extends('layouts.app')
@include('sweetalert::alert')

@section('content')


<div class="container">
    <div class="row">
   
      
        <div class="col-md-12 mt-1">
            <div class="card " style="border:none;" >
                <div class="card-body" style="background-color:#323232">
                    <div class="row">
                        <div class="col-md-6">
 <img src="{{ url('uploads')}}/{{ $barang->gambar }}" class="card-img-top" style="height:500px;width:500px;"alt="...">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2 style="position:relative;bottom:45px;color:#fff;">{{ $barang->nama_barang }}</h2>
                            <h5 style="position:relative;bottom:45px;left:450px;;color:#fff">Rp. {{ number_format($barang->harga) }}</h5>
             
                                 <h6 style="position:relative;bottom:45px;color:#fff">    Detail : <br>  {{ $barang->keterangan }}</h6>  
                                
                                   <hr style="color:#fff;" >

                                       
                                   <div >
                              
                                    <input style="margin:5px;width:30px;height:30px;color:#B9C8DB; " type="radio" name="color" />
                                
                                    <input style="margin:5px;width:30px;height:30px;color:#9098B9 " type="radio" name="color" />
                                  

                                    <input style="margin:5px;width:30px;height:30px;color:#ECDEE8 " type="radio" name="color"  />
                                  
                                   </div>

                                     <hr style="color:#fff;" >
                                   
                                <table class="table" >
                                <tbody>
                                
                                             <td style="position:relative;left:105px;border:none" class="text-light">   Only <span style="color:#9098B9;">{{ number_format($barang->stok) }}</span>! <br> Dont miss it </td>
                             
                               
                                  
                                        <td style="border:none;">
                                             <form method="post" action="{{ url('pesan') }}/{{ $barang->id }}" >
                                            @csrf
                                                <input style="position:relative;right:100px;border-radius:50px;width:100px;text-align:center" type="text" name="jumlah_pesan" value ="1" class="form-control" required="">
                                               
                                                    <input type="alamat" name="alamat" class="form-control " style="position:relative;right:100px;bottom:120px;border-radius:50px;width:400px;" placeholder="isi alamat tujuan" required="">
                                                    
                                                <button type="submit" class="btn btn-secondary mt-5" style="position:relative;right:100px;background-color:#9098B9;border-radius:30px;width:150px;height:50px;"> Beli Sekarang</button>
                                            </form>
                                        </td>
                               
                                   
                                    
                                    
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