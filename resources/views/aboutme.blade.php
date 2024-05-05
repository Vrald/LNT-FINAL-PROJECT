 @extends('layout.main')
@section('container')

    <h1>About Me</h1> <br>

    <div class="about">
        <img src="img/gacor.png"  height = 300px width = 400px  style="border-raidus: 50%;"alt="muka kamu:)" >
        <h2>Name: {{$name}} </h2>
        <h3>Email: {{$email}} </h3>
        <h3>Number: {{$number}} </h3>
    </div>
    
@endsection
