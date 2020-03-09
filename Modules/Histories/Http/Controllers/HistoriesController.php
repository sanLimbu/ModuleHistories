<?php

namespace Modules\Histories\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Illuminate\Support\Str;
class HistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        //return view('histories::index');
        $user = User::find(1);
            $user->update([
              'name' => 'santosh'
            ]);

            // $user->history()->create([
            //   'changed_column' => 'name',
            //   'changed_value_from' => 'santosh',
            //   'changed_value_to'   => 'devika'
            //
            // ]);
    }

    public function histories(User $user)
    {
      return view('histories::users.history', [
        'histories' => $user->history
      ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('histories::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('histories::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('histories::edit');
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
