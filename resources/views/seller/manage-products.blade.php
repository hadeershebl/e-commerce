@extends('layouts.seller-layout')

@section('content')
 <!-- Content Header (Page header) -->
 {{------------- add new tweet section ------------}}
<div class="modal fade " id="modalProductEdit" tabindex="-1"
  aria-labelledby="myModalLabel" aria-hidden="true">
<form action="" method="POST">
  @csrf
<div class="modal-dialog modal-dialog-scrollable" role="document" style="width: 150%">
  <div class="modal-content">
    <div class="modal-header text-center bg-success">
      <h4 class="modal-title w-100 font-weight-bold" style="font-size: 18pt">Edit Product</h4>
      <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="md-form mb-5">
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

    </div>
    <div class="modal-footer d-flex" style="">
     
      <button class="btn btn-success" type="submit" style="color: white; font-size:16pt">
        <i class="far fa-edit"></i>
        Edit!</button>
 
    </div>
  </div>
</div>
</form> 
</div>
{{-- /*-----------------------------------------------*/ --}}
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Manage products</h1>
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
          <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="deleted">
            <strong>Product Deleted successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          @if (session('add_prod') != null) 
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session('add_prod')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            @endif
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr class="bg-warning">
                      <th style="width: 130px">Product photo</th>
                      <th style="width: 140px">Product name</th>
                      <th >Product description</th>
                      <th style="width: 140px">Product type</th>
                      <th style="width: 140px">Product price</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($products as $pro)

                      <tr class="bg-light">
                        <td >
                            <a class="navbar-brand" href="{{url('/')}}">
                                <img src="{{ asset( $pro->photo)}}" width="60" height="60"
                                 style="border-radius: 20%" alt="" loading="lazy">
                            </a>
                          </td>
                        <td>{{$pro->name}}
                        </td>
                        <td  style="max-width: 240px">{{ $pro->description}}</td>
                        <td>{{$pro->type}}</td>
                        <td>{{$pro->price}} L.E</td>
                        <td>
                            <div class="p-2">
                                    {{-- edit btn section --}}
                                <button type="button" class="btn btn-success btn-sm" 
                                  data-toggle="modal" data-target="#modalProductEdit">
                                    <i class="far fa-edit"></i>
                                    Edit</button>
                                  <input type="text" name="product_id" class="proId" value="{{$pro->id}}" hidden>
                                    {{-- delete btn section --}}
                                <button type="button"  data-id="{{$pro->id}}" 
                                  class="deleteProduct btn btn-danger btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                    Delete</button>
                              </div>
                        </td>
                      </tr>

                      @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
        
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection
@section('script')
    <script>
      $(".deleteProduct").click(function(){

        var id = $(this).attr("data-id");
        var token = $("meta[name='csrf-token']").attr("content");
        let btn = this;
        $.ajax(
          {
            url: "/seller/manage-Products/delete/" + id,
            type: 'Delete',
            data: {
              "id": id,
              "_token": token,
              },
            success: function ()
            {
              $(btn).closest('tr').remove();
              $('#deleted').removeClass('d-none');
            }
          });
   
});
    </script>
@endsection