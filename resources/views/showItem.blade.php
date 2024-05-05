@extends('layout.main')

@section('container')

<h1>Item Details</h1><br>
<div class="backg">
    <div class="divs">
        <div class="main">
            <!-- use "php artisan storage:link" in terminal -->
            <div class="imgs">
                <img src=" {{ asset('storage/item_images/'.$item->image) }} " alt= "{{ $item->name }} " style="width: 700px;">
            </div>
            <div class="sub-main">
                <h1>Category: <a href="/categories">{{$item->category->category}} </a></h1>
                <h2> Name: {{$item->name}} </h2>
                <h2> Price: Rp {{$item->price}} </h2>
                <h2> Quantity: {{$item->quantity}} </h2> 
            </div>
            
        </div>
        
        <div class="descriptions">
            <h2>Description</h2>
            <div class="inDescription">
                <h6>{{$item->description}}</h6>
            </div>
        </div>

        <form action="/addCart/{{$item->id}}" method = "POST">    
        @csrf
        <div>
            @if(session()->has('Fail0'))
            <h4 class = "alert alert-danger">{{ session('Fail0') }}</h4>
            @endif 
            @if(session()->has('Fail1'))
            <h4 class = "alert alert-danger">{{ session('Fail1') }}</h4>
            @endif
            @if(session()->has('Fail2'))
            <h4 class = "alert alert-danger">{{ session('Fail2') }}</h4>
            @endif      
            @if($item->quantity == 0)
            <h4 class = "alert alert-danger">Item is out of stock</h4>
            @else
                <input type="number" value = "1" min = "1" class = "form-control quanti" style = "width:100px" name = "quantity"> <br>
                <input class = "btn btn-primary size1"type="submit" value = "Add to Cart">
            @endif
        </div>
        
    </div>
    </form>
        
        @can('is_admin')
        <div class="admin_op">
            
            <form action="/delete-item/{{ $item->id }}" method = "POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger size1" onclick = "return confirm('Delete {{$item->name}}?')">Delete</button>   
            </form>
            <a href="/edit-item/{{ $item->id }}"> <button type="submit" class="btn btn-warning size1 spacings">Edit</button></a>
        </div>
        @endcan
</div>

    

@endsection