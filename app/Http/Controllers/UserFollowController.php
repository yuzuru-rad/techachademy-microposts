<?php

namespace App\Http\Controllers;

class UserFollowController extends Controller
{
    /**
     * ユーザをフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをフォローする
        \Auth::user()->follow($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをアンフォローする
        \Auth::user()->unfollow($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function followings($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $followings = $user->followings()->paginate(10);
        
        return view('users.followings',[
            'user' => $user,
            'users' => $followings,
            ]);
    }
    
    public function followers($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $followings = $user->followers()->paginate(10);
        
        return view('users.followings',[
            'user' => $user,
            'users' => $followers,
            ]);
    }
}
