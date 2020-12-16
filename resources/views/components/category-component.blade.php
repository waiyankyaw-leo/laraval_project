{{-- <div>
    Very little is needed to make a happy life. - Marcus Antoninus
</div> --}}

@foreach($categories as $category)
  <a href="{{route('itemcategory',$category->id)}}" class="dropdown-item">{{$category->name}}</a>
@endforeach