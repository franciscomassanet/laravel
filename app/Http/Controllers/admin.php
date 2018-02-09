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

        if ($admin >= 2) {
            return view('teachers');
        }

        return view('access');
    }

    public function insert_course()
    {
        //
        $id = Auth::user()->email;
        $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();

        if ($admin >= 2) {
            return view('insert_course');
        }

        return view('access');
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
        $id = Auth::user()->email;
        $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();

        if ($admin >= 2) {
            $this->validate($request, array(
                'email' => 'required',
            ));

            if ($request->add == true) {
                DB::table('users')->where('email', $request->email)->update(['is_teacher' => 1]);

            };

            if ($request->delete == true) {
                DB::table('users')->where('email', $request->email)->update(['is_teacher' => 0]);
            };

            if ($request->admin == true) {
                DB::table('users')->where('email', $request->email)->update(['is_teacher' => 2]);
            };

            if ($request->delete_admin == true) {
                DB::table('users')->where('email', $request->email)->update(['is_teacher' => 1]);
            };

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Completed Successfully !');

            return redirect('teachers');
        }

        return view('access');
    }

    /**
     * Edit teacher status
     */
    public function store_course(Request $request)
    {
        //

            $request->validate([
                'name' => 'required|unique:courses|max:255',
                'subject' => 'required',
                'level' => 'required',
            ]);

            DB::table('courses')->insert(
                ['level' => $request->level, 'subject' => $request->subject, 'name' => $request->name]
            );

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'New Course created Successfully !');

            return redirect('insert_course');
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
