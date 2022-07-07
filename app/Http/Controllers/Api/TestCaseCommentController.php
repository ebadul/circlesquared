<?php

namespace App\Http\Controllers\Api;

use App\Models\TestCaseComment;
use App\Http\Requests\StoreTestCaseCommentRequest;
use App\Http\Requests\UpdateTestCaseCommentRequest;
use App\Http\Controllers\Controller;


class TestCaseCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTestCaseCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestCaseCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestCaseComment  $testCaseComment
     * @return \Illuminate\Http\Response
     */
    public function show(TestCaseComment $testCaseComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestCaseComment  $testCaseComment
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCaseComment $testCaseComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestCaseCommentRequest  $request
     * @param  \App\Models\TestCaseComment  $testCaseComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestCaseCommentRequest $request, TestCaseComment $testCaseComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestCaseComment  $testCaseComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestCaseComment $testCaseComment)
    {
        //
    }
}
