<?php

namespace App\Http\Controllers\ExternalApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IceAndFireApisController extends Controller
{
    public function index($nameOfABook)
    {
        $getData= Http::get('https://www.anapioficeandfire.com/api/books',["name"=>$nameOfABook]);
        
        if(isset($getData[0]))
        {
            return [
                "status_code"=>200,
                "status"=>"success",
                "data"=>[
                            [
                                "name" => $getData[0]["name"],
                                "isbn" => $getData[0]["isbn"],
                                "authors" => $getData[0]["authors"],
                                "number_of_pages"=>$getData[0]["numberOfPages"],
                                "publisher"=>$getData[0]["publisher"],
                                "country"=> $getData[0]["country"],
                                "release_date"=> $getData[0]["released"]
                            ]
                        ]
                    ];
        }
        else{
                return [
                        "status_code"=>200,
                        "status"=>"success",
                        "data"=>[]
                    ];
            }
        
    }
}
