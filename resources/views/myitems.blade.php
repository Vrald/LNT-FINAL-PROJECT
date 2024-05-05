@extends('layout.main')

@section('container')
<h1>My Items</h1>
<br>

@if ($items->isNotEmpty())
<div class="mine">
    @foreach($items as $item)

    
    <div class="inMine">
        <a href="/show-item/{{ $item->id }}"> 
            <img src=" {{ asset('storage/item_images/'.$item->image) }} " alt= "{{ $item->name }} " style="width: 400px; height: 300px;">
            <a href="/categories" style="text-decoration: none; color: black;"><h4> Category: {{$item->category->category}}</h4></a>
            <a href="/show-item/{{ $item->id }}" style="text-decoration: none; color: black;"> <h4> Name: {{ $item->name }} </h4> </a>
            <h5> Price: Rp {{ $item->price }} </h5>
            <h5> Quantity: {{ $item->quantity }} </h5><br>
        </a>
    </div>
    
    @endforeach
</div>
@else

    <div style="display:flex;, align-item: center; justify-content: center; color: #dcdcdc; height: 100%;">
        <h1>Empty :(</h1>
    </div>
    
@endif

@endsection