<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'bu_name'=>'required|min:5|max:100',//inputname=>validation
            'bu_price'=>'required',
            'bu_rent'=>'required|integer',
            'bu_square'=>'required|numeric|min:60',
            'bu_type'=>'required|integer',
            'bu_place'=>'required|integer',
            'bu_small_ds'=>'required|min:5|max:160',
            'bu_meta'=>'required',
            'bu_langtude'=>'required|numeric',
            'bu_latitude'=>'required|numeric',
            'bu_large_ds'=>'required|min:5',
            'rooms'=>'required|integer',
            "image"=>"nullable|sometimes|".v_image(),
            //because of image is optional you cant put image validation put only mimes|types
            
        ];
    }
}
