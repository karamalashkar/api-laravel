<?php

namespace App\Http\Controllers;

use Hamcrest\Type\IsNumeric;
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

    function divideNumber(Request $request){
        $num=$request->num;
        //check if input is integer
        if(is_numeric($num)){
            $number=$num;
            $power=0;
            $numbers = array();

            //loop over each digit of the number
            do{
                $digit=$num % 10;
                array_push($numbers, $digit * pow(10,$power));
                $power++;
            }
            while($num=(int)($num/10));

            $reversed_number=array_reverse($numbers);

            return response()->json([
                'status' => 'yes',
                'number' => $number,
                'response' => $reversed_number
            ]);
        }
    }
    
    function decimalToBinary(Request $request){
        $text=$request->text;

        $delimiter=' ';
        $words=explode($delimiter,$text);
        $response='';

        //adding each word to new string by converting each number to binary
        foreach($words as $word){
            if(is_numeric($word)){
                $binary=decbin($word);
                $word=$binary;
            }
            
            $response.=$word.' ';    
        }

        return response()->json([
            'status' => 'yes',
            'text' => $text,
            'response' => $response
        ]);
        
    }
}



