<?php

namespace App\Http\Middleware;

use Closure;
use App\Comment;
use Auth;

class MustBeOwnerOfComment
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
        $id = $request->comment->id;
        $currentComment = Comment::find($id);

        if($user && $user->name == Auth::user()->name && $currentComment->user_id == Auth::user()->id){
                    return $next($request); // They're the owner, lets continue...
                
            }else{
                abort(404,'you are not authorised for this action');
            }
        return $next($request);
    }
}
