<?php

namespace OrlandoLibardi\NewsletterCms\app\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use OrlandoLibardi\NewsletterCms\app\NewsletterUser;
use OrlandoLibardi\NewsletterCms\app\Newsletter;
use OrlandoLibardi\NewsletterCms\app\Http\Requests\NewsletterUserRequest;

use OrlandoLibardi\NewsletterCms\app\ServiceDownload;


class NewsletterUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list');
        $this->middleware('permission:create', ['only' => ['create', 'store', 'download']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) 
    {
        $newsletter = Newsletter::find($id);
        return view('admin.newsletter.user.index', compact('newsletter'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsletterUserRequest $request)  {
        NewsletterUser::create($request->all());
        return response()
              ->json(array( 
                'message' => __('messages.create_success'), 
                'status'  =>  'success'), 
                200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsletterUserRequest $request, $id)
    {
        foreach(json_decode($request->id) as $id)
        {
            NewsletterUser::find($id)->delete();
        }

        return response()
                ->json(array(
                    'message' => __('messages.update_success'), 
                    'status'  =>  'success'), 
                201);
    }

    public function download($id)
    {
        return ServiceDownload::excel($id);
    }

}
