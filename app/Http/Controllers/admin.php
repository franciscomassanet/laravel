<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class admin extends Controller
{
    /**
     * Allows access to teacher admin.
     */
    public function teachers()
    {
        //
        $id = Auth::user()->email;
        $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();

        if ($admin == 1) {
            return view('teachers');
        }

        echo 'sorry you do not have access';
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * Edit teacher status
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
            'email' => 'required',
        ));

        if ($request->add == true){
            DB::table('users')->where('email', $request->email)->update(['is_teacher' => 1]);

        };

        if ($request->delete == true){
        DB::table('users')->where('email', $request->email)->update(['is_teacher' => 0]);
        };

        return redirect('teachers');
    }

    /**
     *
     */
    public function show(Post $post)
    {
        //
    }

    /**
     *
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Post $post)
    {
        //
    }
}
