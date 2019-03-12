<?php

namespace OrlandoLibardi\NewsletterCms\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OrlandoLibardi\NewsletterCms\app\Rules\NewsletterUserEmail;

class NewsletterUserRequest extends FormRequest
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
                    'newsletter_id' => 'required|exists:newsletters,id',
                    'email' => ['required', new NewsletterUserEmail($this->newsletter_id) ],
                    ];   
            break;    
            case 'PUT':
            case 'PATCH':
                $rules = [
                    'newsletter_id' => 'required|exists:newsletters,id',
                    'email' => ['required', new NewsletterUserEmail($this->newsletter_id) ],
                    ]; 
            break;
            case 'DELETE':
                $rules = [
                    'id.*' => 'required|exists:newsletter_users,id' 
                ];
            break;
            default:
                 $rules = [];
        }

        return $rules;

    }

}
