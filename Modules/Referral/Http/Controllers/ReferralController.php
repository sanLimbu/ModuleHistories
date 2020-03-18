<?php

namespace Modules\Referral\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Illuminate\Support\Facades\Mail;
use Modules\Referral\Emails\ReferralReceived;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

     public function __construct()
     {
       $this->middleware(['auth']);
     }

    public function index(Request $request)
    {
       $referrals = $request->user()->referrals()->orderBy('completed','desc')->get();
        return view('referral::index', compact('referrals'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('referral::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $referral = $request->user()->referrals()->create($request->only('email'));
        Mail::to($referral->email)->send(
        new ReferralReceived($request->user(), $referral)
        );
         return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('referral::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('referral::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
