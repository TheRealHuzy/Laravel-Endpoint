<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyRequest;

class APIMealsController extends Controller
{
    public function generateAPIAnswer()
    {
        $request = self::getDataFromQueryParams();
        
        $response = $request->getResponse();
        return $response;
    }

    private function getDataFromQueryParams()
    {
        $myRequest = new MyRequest;
        $myRequest->language = request()->query('lang');
        $myRequest->perPage = request()->query('per_page');
        $myRequest->page = request()->query('page');
        $myRequest->category = request()->query('category');
        $myRequest->tags = request()->query('tags');
        $myRequest->ingredients = request()->query('ingredients');

        $with[] = request()->query('with');
        if ($with != null) $myRequest = self::extractIncludeParams($myRequest, $with);

        $myRequest = self::checkObligatoryDefaultValues($myRequest);

        return $myRequest;
    }

    private function extractIncludeParams(MyRequest $myRequest, $array)
    {
        if(in_array('category', $array)) $myRequest->includeCategory = true;
        if(in_array('tags', $array)) $myRequest->includeTags = true;
        if(in_array('ingredients', $array)) $myRequest->includeIngredients = true;
        return $myRequest;
    }

    private function checkObligatoryDefaultValues(MyRequest $myRequest)
    {
        if($myRequest->language == null) $myRequest->language = 'en';
        if($myRequest->perPage == null) $myRequest->perPage = 5;
        if($myRequest->page == null) $myRequest->page = 1;

        return $myRequest;
    }
}