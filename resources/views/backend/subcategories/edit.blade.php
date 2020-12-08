@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Subcategories</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Subcategories</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h2>Subcategories Edit Form</h2>
            <form method="post" action="{{route('subcategories.update',$subcategory->id)}}" >
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="exampleInputName">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName" placeholder="Eg: Electronic, Fashion, ..." value="{{$subcategory->name}}">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
               <div class="form-group">
                <label for="exampleInputPhoto">Category:</label>
                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="category">
                  <option selected>Choose Category...</option>
                  @foreach($categories as $row)
                    @if ($subcategory->category_id === $row->id)   
                    <option value="{{$row->id}}" selected="">{{$row->name}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endif
                   @endforeach
              </select>
                @error('photo')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection