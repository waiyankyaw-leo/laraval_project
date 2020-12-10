@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Items</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('items.index')}}">Items</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h2>Items Edit Form</h2>
            <form method="post" action="{{route('items.update',$item->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <label for="exampleInputName" class="col-sm-2 col-form-label">Item Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName" value="{{$item->name}}">
                @error('name')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPhoto" class="col-sm-2 col-form-label">Photo:</label>
                <div class="col-sm-10">
                <ul class="nav nav-tabs " id="myTab" role="tablist ">
                  <li class="nav-item " role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New</a>
                  </li>
                </ul>
                <div class="tab-content mt-3 " id="myTabContent">
                  <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                    <img src="{{$item->photo}}" class="img-fluid" width="100">
                    <input type="hidden" name="oldphoto" value="{{$item->photo}}">
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" id="exampleInputPhoto">
                    @error('photo')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              </div>
              <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Item Code </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="code" value="{{$item->codeno}}" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="profile" class="col-sm-2 col-form-label"> Price </label>
                          <div class="col-sm-10">
                            <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Unit Price </a>
                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Discount</a>
                              </div>
                          </nav>
                          <div class="tab-content mt-2" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <input type="text" class="form-control" id="name_id" name="price" value="{{$item->price}}">
                              </div>
                              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <input type="text" class="form-control" id="name_id" name="discount" value="{{$item->discount}}">
                                
                              </div>
                          </div>
                          </div>
                         </div>

                         <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label"> Description </label>
                              <div class="col-sm-10">
                                <textarea class="form-control summernote" rows="3" name="description" >{{$item->description}}</textarea>
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label"> Brand </label>
                              <div class="col-sm-10">
                                <select class="form-control" name="brandid">
                                  <option >Choose Brand</option>
                                  @foreach($brands as $row)
                                    @if ($item->brand_id === $row->id)   
                                    <option value="{{$row->id}}" selected="">{{$row->name}}</option>
                                    @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endif
                                   @endforeach
                                </select>
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label"> Subcategory </label>
                              <div class="col-sm-10">
                                <select class="form-control" name="subcategoryid">
                                  <option >Choose Subcategory</option>
                                   @foreach($subcategories as $row)
                                    @if ($item->subcategory_id === $row->id)   
                                    <option value="{{$row->id}}" selected="">{{$row->name}}</option>
                                    @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endif
                                   @endforeach
                                </select>
                              </div>
                          </div>

                       
              
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection