@extends('layouts.seller-layout')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add new product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('sellerHome')}}">Home</a></li>
            <li class="breadcrumb-item active">Add new product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content ml-5 pb-5 pl-5">
    <div class="row">
      <div class="col-md-10">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Product details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                
              </button>
            </div>
          </div>
          <form action="{{route('add-new-product')}}" method="POST"  enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="inputName"> Name</label>
              <input type="text" id="inputName" class="form-control" name="productName">
            </div>
            <div class="form-group">
              <label for="inputDescription"> Description</label>
              <textarea id="inputDescription" class="form-control" rows="4" name="productDescrip"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile"> Photo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="productPhoto">
                    <label class="custom-file-label" for="exampleInputFile">Choose Photo</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
            <div class="form-group">
              <label for="inputStatus">Type</label>
              <select id="inputStatus" class="form-control custom-select" name="type">
                <option selected disabled>Select one</option>
                <option value="meal">Meal</option>
                <option value="fries">Fries</option>
                <option value="sandwich">Sandwich</option>
                <option value="pizza">Pizza</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputClientCompany">Price</label>
              <div class="input-group">
                <input type="text" class="form-control" name="productPrice">
                <div class="input-group-append">
                  <span class="input-group-text">L.E</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="card-footer">    
            <button type="submit" class="btn btn-info float-right">Add product</button>
          </div>
        </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
  <!-- /.content -->

  @endsection