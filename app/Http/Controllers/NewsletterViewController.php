<?php

namespace OrlandoLibardi\NewsletterCms\app\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use OrlandoLibardi\NewsletterCms\app\NewsletterUser;
use OrlandoLibardi\NewsletterCms\app\Http\Requests\NewsletterUserRequest;
use OrlandoLibardi\NewsletterCms\app\Http\Requests\NewsletterUserViewRequest;
use OrlandoLibardi\NewsletterCms\app\Notifications\NewsletterNotification;

use Illuminate\Support\Facades\URL;

class NewsletterViewController extends Controller
{  
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsletterUserRequest $request) 
    {        
        $newsletterUser = NewsletterUser::create($request->all());
        $confirm_link = URL::signedRoute('newsletter-confirm', ['user' => $newsletterUser->id]);
        $newsletterUser->notify(new NewsletterNotification($confirm_link, config('newsletter.subscribe_template'), config('newsletter.subscribe_title')));
        return back()->with('success', [__('messages.create_success')]);  
    }
    //NewsletterUserViewRequest
    public function confirm(NewsletterUserViewRequest $request)
    {        
        if(!$request->hasValidSignature()) { return abort(404); }
        
        $newsletterUser = NewsletterUser::find($request->user);
        $newsletterUser->status = 1;
        $newsletterUser->save();        
        $newsletterUser->notify(new NewsletterNotification(false, config('newsletter.confirmed_template'), config('newsletter.confirmed_title')));

        return redirect('/');

    }
    //NewsletterUserViewRequest
    public function unsubscribe(NewsletterUserViewRequest $request)
    {
        $newsletterUser = NewsletterUser::where('email', $request->email)->first();

        $newsletterUser->notify(new NewsletterNotification(false, config('newsletter.unsubscribe_template'), config('newsletter.unsubscribe_title')));

        NewsletterUser::where('email', $request->email)->delete();

        return redirect('/');
    }

}
