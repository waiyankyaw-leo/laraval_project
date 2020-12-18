{{-- <div>
    Simplicity is the ultimate sophistication. - Leonardo da Vinci
</div> --}}

@foreach($categories as $category)
	<li class="{{Request::is('itemcategory/'.$category->id)? 'active' : '' }} "><a href="{{route('itemcategory',$category->id)}}" >{{$category->name}}</a></li>
@endforeach