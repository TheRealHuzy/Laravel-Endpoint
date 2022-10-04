@extends ('default')

@section('content')
    <h1>Main page</h1>

    <form method="POST" action="meals">
    @csrf
        <p>
            <button type="submit">Create data</button>
        </p>   
    </form>
    <form method="GET" action="endpoint">
        <p>
            <button type="submit">Go to endpoint</button>
        </p>   
    </form>
@endsection