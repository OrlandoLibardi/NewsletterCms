<?php

namespace OrlandoLibardi\NewsletterCms\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use OrlandoLibardi\NewsletterCms\app\Newsletter;
use OrlandoLibardi\NewsletterCms\app\Http\Requests\NewsletterRequest;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list');
        $this->middleware('permission:create', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = Newsletter::paginate(15);
        return view('admin.newsletter.index', compact('newsletters'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.newsletter.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsletterRequest $request)
    {
        Newsletter::create($request->all());
        return response()
              ->json(array( 
                'message' => __('messages.create_success'), 
                'status'  =>  'success'), 
                200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id )
    {
        $newsletter = Newsletter::find($id);
        return view('admin.newsletter.index', compact('newsletter'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(NewsletterRequest $request, $id)
    {
         Newsletter::find($id)
                    ->update($request->all());
        return response()
                ->json(array(
                    'message' => __('messages.update_success'), 
                    'status'  =>  'success'), 
                201);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsletterRequest $request, $id)
    {
        foreach(json_decode($request->id) as $id)
        {
            Newsletter::find($id)->delete();
        }

        return response()
                ->json(array(
                    'message' => __('messages.destroy_success'), 
                    'status'  =>  'success'), 
                201);
    }
}
