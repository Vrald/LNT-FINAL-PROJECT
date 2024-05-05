@extends('layout.main')

@section('container')


@if ($category->items->isNotEmpty())
    @php
        $firstItem = $category->items->first();
    @endphp

    <a href="/categories" style="text-decoration: none; color: black;">
        <h1>Category: {{ $firstItem->category->category }}</h1> <br>
    </a>
    
    <div class="mine">
        @foreach($category->items as $item)
            <div class="inMine">
                <a href="/show-item/{{ $item->id }}"> 
                <img src="{{ asset('storage/item_images/'.$item->image) }}" alt="{{ $item->name }}" style="width: 400px; height: 300px;">
                <a href="/show-item/{{ $item->id }}" style="text-decoration: none; color: black;">
                    <h4>Name: {{ $item->name }}</h4>
                </a>
                <h5>Price: Rp {{ $item->price }}</h5>
                <h5>Quantity: {{ $item->quantity }}</h5><br>
                </a>
            </div>
        @endforeach
    </div>

@else

    <div style="display:flex;, align-item: center; justify-content: center; color: #dcdcdc; height: 100%;">
        <h1>No items found in this category.</h1>
    </div>
    
@endif
@endsection