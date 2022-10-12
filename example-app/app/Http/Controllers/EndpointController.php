<?php

namespace App\Http\Controllers;

use App\Models\MyRequest;

class EndpointController extends Controller
{
    public function endpoint(){
        return view('endpoint');
    }

    public function generateEndpointAnswer()
    {
        $request = self::getDataFromForm();
        
        $response = $request->getResponse();
        dd($response);
        return back();
    }

    private function getDataFromForm()
    {
        //? constructor not working ?
        $myRequest = new MyRequest;
        $myRequest->language = request('lang');
        $myRequest->perPage = request('perPage');
        $myRequest->page = request('page');
        $myRequest->category = request('category');
        $myRequest->tags = request('tags');
        $myRequest->ingredients = request('ingredients');
        $myRequest->includeCategory = request('includeCategory') ? true : false;
        $myRequest->includeTags = request('includeTags') ? true : false;
        $myRequest->includeIngredients = request('includeIngredients') ? true : false;
        return $myRequest;
    }
}