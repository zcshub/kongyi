<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Response;

use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function changeIcon(Request $request)
    {
        if($request->ajax())
        {
            if($request->newIcon)
            {
                $newIcon = $this->parseIconName($request->newIcon);
                $user = Auth::user();
                if($newIcon != $user->icon)
                {
                    $user->icon = $newIcon;
                    $user->save();
                    return Response::json(array('success'=>''));
                }
                
            }
            
        }
    }

    public function somebody($id)
    {
        $somebody = User::find($id);
        $user = (object)array(
            'name'=>$somebody->name,
            'icon'=>$somebody->icon
            );
        return view('user.somebody', compact('user'));
    }

    private function parseIconName($str)
    {
        $arr = explode('/', $str);
        return $arr[sizeof($arr)-1];
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
