@extends ('default')

@section('content')

    <h1>Endpoint page</h1>

    
    <form method="GET" action="meals">
        <p>
            <button type="submit">Go back</button>
        </p>   
    </form>
    <form method="POST" action="endpoint">
    @csrf
        <lable name="lbllang">Language</label><br>
        <input type="text" name="lang" placeholder="Language..." required></input><br><br>

        <lable name="lblperPage">Number of meals per page</label><br>
        <input type="number" name="perPage" placeholder="Per page..." min="1" required></input><br><br>

        <lable name="lblpage">Desired page</label><br>
        <input type="number" name="page" placeholder="Page..." min="1" required></input><br><br>

        <lable name="lblcategory">Category</label><br>
        <input type="text" name="category" placeholder="Category..."></input><br>
        <input type="checkbox" name="includeCategory">
        <label name="lblincludeCategory">Include in response</label><br><br>

        <lable name="lbltags">Tags</label><br>
        <input type="text" name="tags" placeholder="Tags..."></input><br>
        <input type="checkbox" name="includeTags">
        <label name="lblincludeTags">Include in response</label><br><br>

        <lable name="lblingredients">Ingredients</label><br>
        <input type="text" name="ingredients" placeholder="Ingredients..."></input><br>
        <input type="checkbox" name="includeIngredients">
        <label name="lblincludeIngredients">Include in response</label><br><br>

        <p>
            <button type="submit">Get Data</button>
        </p>   
    </form>

@endsection