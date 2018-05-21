<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->reply);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Question $question, Request $request)
    {
        $reply = $question->reply()->create($request->all());
        return response(['reply' => new ReplyResource($reply)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @param  \App\Model\Reply $reply
     * @return ReplyResource
     */
    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Question $question
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Reply $reply
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response('Update', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @param  \App\Model\Reply $reply
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        return response(Response::HTTP_NO_CONTENT);
    }
}
