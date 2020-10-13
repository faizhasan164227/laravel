@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 bg-white">
        
    </div> 

    <div class="col-12 bg-white">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="m-0 p-0">Add Product
                    <a href="{{ url('/product') }}" class="btn btn-primary float-right mr-2">
                    <i class="fas fa-chevron-left"></i></a>
                </h2>
            </div>
            <form action="/product/add" method="POST">
                    @csrf
            <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Title</label>
                        <input type="text" name="product_title" class="form-control" placeholder="please enter the product name" >
                      </div>    

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Slug</label>
                        <input type="text" name="product_slug" class="form-control" placeholder="please enter the product slug" >
                      </div>    

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Image</label>
                        <input type="text" name="product_image" class="form-control" placeholder="please enter the product image" >
                      </div>    
                      <input class="btn btn-success float-right" type="submit" value="Add Product">

            </div>
            </form>
        </div>
    </div>

       
</div>    
@endsection 