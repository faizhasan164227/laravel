@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="col-12 bg-white">
            <a href="{{  url('addproduct') }}" class="btn btn-success float-right mb-3 mt-1">Add</a>

            @if(session('error'))
        <div class="alert alert-danger col-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{session('error')}}</strong>
          </div>
        @endif

        @if(session('info'))
        <div class="alert alert-success col-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{session('info')}}</strong>
          </div>
        @endif

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Slug</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $users)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $users->product_title }}</td>
                        <td>{{ $users->product_slug }}</td>
                        <td>{{ $users->product_image }}</td>
                        <td class="">
                            <a href="{{ url('/product', $users->product_slug) }}">
                                <button class="btn btn-primary center">Show</button>
                            </a>
                            <a href="/product/edit/{{ $users->product_slug }}">
                                <button class="btn btn-success center">Edit</button>
                            </a>
                            
                            <form action="/product/delete/{{ $users->product_slug }}" method="post">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger center" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
              {{ $data->links() }}

              <div>
                    @if(session('infopr'))
                    <div class="alert alert-success form-group">
                    {{session('infopr')}} 
                    </div>
                    @elseif(session('infodl'))
                    <div class="alert alert-danger form-group">
                    {{session('infodl')}} 
                    </div>
                    @elseif(session('infoedit'))
                    <div class="alert alert-primary form-group">
                    {{session('infoedit')}} 
                    </div>
                    @endif
                </div>
        </div>
    </div>
</div>    
@endsection