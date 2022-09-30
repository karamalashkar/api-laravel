<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    function sortString(Request $request){
        $word=$request->word;

        $numbers=array(0,1,2,3,4,5,6,7,8,9);
        
        //get new sorted string without numbers
        $result=str_replace($numbers,'',$word);
        $word_letters=str_split($result);
        sort($word_letters);
        
        //get sorted numbers
        $get_number=(string)filter_var($word, FILTER_SANITIZE_NUMBER_INT);
        $number=str_split($get_number);
        sort($number);

        //concatenation letters and numbers
        $sorted_word= implode($word_letters) . implode($number);

        return response()->json([
            'status' => 'yes',
            'word' => $word ,
            'response' => $sorted_word 
        ]);
    }
    
}
