<?php
DB::table('users')->where('email', $request->email)->update(['is_teacher' => 1]);
return view('teachers');
?>