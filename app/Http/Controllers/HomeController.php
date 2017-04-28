<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\url;
use DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    
    public function createUrl(Request $request){
    	try{
    		$response = array('result' => 'error');
	    	$request = $request->all();
	    	$validations = array('url' => 'required|max:255');
	    	$validator = validator($request, $validations);
	    	
	    	if ($validator->fails()) {
	    		$response['errors'] = array('error' => $validator->messages());
			} else{
				$url = new url;
				$url = $url->where('long_url', $request['url'])->get()->toArray();
				if(!empty($url)){
					$response['errors'] = array('error' => 'Already exists');
				} else{
					DB::beginTransaction();
					$url = new url;				
					$url->long_url = $request['url'];
					$url->save();
					
					while(1){
						$id=rand(10000,99999);
						$short_link = base_convert($id, 20, 36);
						if(!$url->where('short_link',$short_link)->get()->toArray())
							break;
					} 

					$url->where('id', $url->id)->update(['short_link' => $short_link]);
					DB::commit();
					$response = array(
						'result' => 'success',
						'data'=> array('short_link' => $short_link)
					);
				}
			}
    	} catch(Exception $e){
    		DB::rollBack();
    		$response  = array('errors' => $ex);
    	}
		return response()->json($response);
    }

    public function getUrl($url){
    	$link = new url;
    	$link = $link->where('short_link', $url)->get()->toArray();
    	if(!empty($link))
    		return Redirect::to($link[0]['long_url']);
    	else
    		return "No such url exist. <a href='javascript:history.go(-1)'>Go back</a>";
    }
}
