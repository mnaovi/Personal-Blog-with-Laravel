<?php

namespace App\Http\Controllers\User;

use App\Model\user\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postController extends Controller
{
    public function post(post $post)
    {
    	
        return view('user.post',compact('post'));
    }
}
