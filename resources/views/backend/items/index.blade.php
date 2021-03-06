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
        <li class="breadcrumb-item"><a href="#">Items</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h2 class="d-inline-block">Items List</h2>
            <a href="{{route('items.create')}}" class="btn btn-primary float-right">Add New</a>
            <div class="table-responsive">
              <table class="table table-hover table-bordered mt-3" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Codeno</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i= 1; @endphp
                  @foreach($items as $row)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->codeno}}</td>

                    @php $photo=json_decode($row->photo,TRUE) 
                    @endphp
                    
                    <td><img src="{{ $photo[0] }}" width="100"></td>
                    
                    @if($row->discount > 0)
                    <td>{{number_format($row->price - $row->discount)}}<br>
                      <strike>{{number_format($row->price)}}</strike></td>
                    @else
                    <td>{{number_format($row->price)}}</td>
                    @endif
                    <td>{!!$row->description!!}</td>
                    <td>{{$row->brand->name }}</td>
                    <td>{{$row->subcategory->name}}</td>
                    <td>
                      <a href="{{route('items.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                      <form method="post" action="{{route('items.destroy',$row->id)}}" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="btn-delete" class="btn btn-danger" value="Delete">
                      </form>
                      <a href="{{route('items.show',$row->id)}}" class="btn btn-warning">Details</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection