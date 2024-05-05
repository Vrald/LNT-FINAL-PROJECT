@extends('layout.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@section('container')
<h1>Categories</h1>
<br>

<table border="5" cellspacing="2" cellpadding="10">
    
@foreach($categories as $category)

    <tr>
        <td><a href="/show-category/{{ $category->id }}" class = "mt-4"> 
            <h4><i class="bi bi-arrow-right"> </i>    {{ $category->category }} </h4> </a>
        </td>
    </tr>
    



@endforeach
</table>
@endsection