@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#323232">
<div class="card w-100 mb-3 " style="background-color:#3B3B3B;height:150px;">
  <div class="card-body">
    <h3 class="card-title mx-3 text-light">Grab Upto 50% Off On <br> Selected Headphone</h3>
    <img src="uploads/headphone.png" class="card-img-left" style="position:absolute;bottom:-1px;left:900px;height:150px;z-index:1" alt="...">
    <a href="#" class="btn mx-3 px-3 text-light" style="background-color:#9098B9;border-radius:150px;">BUY NOW</a>
  </div>
</div>
   <div class="row justify-content-center">
      <div class="col-md-12 mb-4">
        
      </div>
      @foreach($barangs as $barang)
      <div class="col-md-4">
         <div class="card rounded-8 " style="border-radius:15px;">
            <img src="{{ url('uploads')}}/{{ $barang->gambar }}" class="card-img-top" style="border-radius: 15px;height:300px;" alt="...">
           <div class="card-body rounded-6">
             <h5 class="card-title">{{ $barang->nama_barang }}<br>        Rp. {{ number_format($barang->harga) }}</h5>
    
              <a href="{{ url('pesan')}}/{{ $barang->id}}" class="btn" style="background-color:#9098B9;color:white;"> Beli</a>
           </div>
         </div>
      </div>
   
      @endforeach
   </div>
      <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" ><i class="fa-regular fa-gift"></i></button>

</button>
</div>



@endsection


