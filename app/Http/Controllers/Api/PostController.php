<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogComment;
use Exception;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request) 
    {
        try
        {
            $comment = BlogComment::create([
                'body' => $request->body,
                'blog_id' => $request->blog_id,
                'user_id' => $request->user_id,
            ]);
            $stat = 'success';
        } catch (Exception $e)
        {
            $stat = $e->getMessage();
        }
        return response()->json([
            'stat' => $stat
        ]);
    }
}
