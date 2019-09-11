<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Yajra\Datatables\Datatables;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::findOrFail($id);

        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comment::findOrFail($id);

        return view('admin.comments.edit', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $comments = Comment::findOrFail($id);
        $comments->update($request->all());

        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Comment::destroy($id)) 
            return redirect()->back();
        else
            return redirect()->route('admin.comments.index');
    }

    public function dataTable()
    {
        $comments = Comment::query();
        return DataTables::of($comments)
                ->addColumn('comment', function($comments){
                    return substr($comments->body, 0, 30);
                })
                ->addColumn('post', function($comments){
                    return substr($comments->post->title, 0, 30);
                })
                ->addColumn('status', function($comments){
                    return $comments->status == 1 ? 'Publish' : 'Hide';
                })
                ->addColumn('action', function($comments){
                    return view('layouts.admin.partials._action', [
                        'model' => $comments,
                        'show_url' => route('admin.comments.show', $comments->id),
                        'edit_url' => route('admin.comments.edit', $comments->id),
                        'delete_url' => route('admin.comments.destroy', $comments->id),
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
