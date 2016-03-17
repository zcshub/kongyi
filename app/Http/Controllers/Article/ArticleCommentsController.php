<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\ArticleComments;

class ArticleCommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index($id)
    {
        $comments = ArticleComments::ofArticle($id)->newComments()->get();
        $commentsArr = [];
        $hideComments = [];
        foreach ($comments as $comment)
        {
            $commentsArr[$comment->id] = (object)['comment'=>$comment, 
                                'pids'=>ArticleCommentsController::parseThread($comment->thread)];
            if($comment->parent_id == 0){
                if(array_has($hideComments, $comment->id)){
                    array_forget($hideComments, $comment->id);
                }
                continue;
            }
            $hideComments = array_add($hideComments, $comment->parent_id, $comment->parent_id);
        }
        return ['commentsArr'=>$commentsArr, 'hideComments'=>$hideComments];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:600'
        ]);
        if($validator->fails()){
            return Response::json(array('error'=>$validator->errors()));
        }
        if($request->ajax()){
            $comment = new ArticleComments();
            $comment->article_id = $request->article_id;
            $comment->parent_id = $request->parent_id;
            $comment->content = $request->content;
            $comment->status = 1;
            if($request->parent_id == 0){
                $comment->thread = '';
            }else{
                $parentComment = ArticleComments::ofID($request->parent_id)->first();
                $comment->thread = $parentComment->thread.'/'.$parentComment->id;
            }
            $comment->user_id = Auth::user()->id;
            $comment->save();
            return Response::json($comment);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private static function parseThread($thread)
    {
        $arr = explode('/', $thread);
        $arrR = [];
        foreach ($arr as $v) {
           if($v != ''){
                array_push($arrR, $v);
           }
        }
        return $arrR;
    }
}
