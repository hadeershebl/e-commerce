@extends('layouts.seller-layout')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>My products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
           
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          {{-- show alerts section --}}
          @if (session('add_prod') != null) 
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session('add_prod')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif
          <!-- Default box -->
          <div class="row row-cols-1 row-cols-md-3">
            @foreach ($products as $product)
            <div class="col mb-4">
              <div class="card">
                <img src="{{ asset($product->photo) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-text">{{ $product->name}}</h3>
                  <h6 class="card-text mb-2 mt-3"> Type : {{ $product->type}}</h6>
                  <h6 class="card-text"> Description : {{$product->description}}</h6>
                  <footer class="blockquote-footer" style="font-size: 12pt"> Price : {{ $product->price}} L.E</footer>
                </div>
              </div>
              
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection