<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Post;

class MustBeOwnerOfPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $id = $request->postid;
        $currentPost = Post::find($id);

        if($user && $user->name == Auth::user()->name && $currentPost->user_id == Auth::user()->id){
                    return $next($request); // They're the owner, lets continue...
                
            }else{
                abort(404,'you are not authorised for this action');
            }
    }
}
