<?php

namespace OrlandoLibardi\NewsletterCms\app\Rules;

use Illuminate\Contracts\Validation\Rule;
use OrlandoLibardi\NewsletterCms\app\NewsletterUser;

class NewsletterUserEmail implements Rule
{
    protected $newsletter_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($param)
    {
         $this->newsletter_id = $param;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(NewsletterUser::where([['email', '=', $value], ['newsletter_id', '=', $this->newsletter_id ]])->first()){
            return false;
        }

        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Endereço de email já cadastrado para essa lista.';
    }
}
