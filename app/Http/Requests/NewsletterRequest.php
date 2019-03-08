<?php

namespace OrlandoLibardi\NewsletterCms\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
        switch($this->method()){
            case 'POST':
                $rules = [
                    'titulo' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255'
                    ];   
            break;    
            case 'PUT':
            case 'PATCH':
                $rules = [
                    'titulo' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255'
                    ]; 
            break;
            case 'DELETE':
                $rules = [
                    'id.*' => 'required|exists:newsletters,id' 
                ];
            break;
            default:
                 $rules = [];
        }

        return $rules;

    }

}
