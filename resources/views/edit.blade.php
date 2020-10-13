@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 bg-white">
        
    </div> 

    <div class="col-12 bg-white">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="m-0 p-0">Edit 
                    <a href="{{ url('/product') }}" class="btn btn-primary float-right mr-2">
                    <i class="fas fa-chevron-left"></i></a>
                </h2>
            </div>
            <div class="card-body">

                @foreach ($data as $users)
                    <form action="{{'/product/update/'. $users->product_slug}}" method="POST">
                    @csrf
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" class="form-control" value="{{$users->id}}" name="id" readonly>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Title</label>
                        <input type="text" class="form-control" value="{{$users->product_title}}" name="title">
                      </div>
                      @if(session('info'))
                        <div class="alert alert-danger col-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>{{session('info')}}</strong>
                        </div>
                        @endif
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Slug</label>
                        <input type="text" class="form-control" value="{{$users->product_slug}}" name="slug">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product Image</label>
                          <input type="text" class="form-control" value="{{$users->product_image}}" name="image">
                      </div>
                      <input class="btn btn-success float-right" type="submit" value="Save Product">
                      @endforeach

                    
                </form>
            </div>
        </div>
    </div>

       
</div>    
@endsection