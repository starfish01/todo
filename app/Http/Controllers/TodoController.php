<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = auth()->user()->accessibleTodos();
        return Inertia::render('Todo/Show', ['data' => $data]);
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

        // $request->description = '---';
        // $request->status = 'not done';
        Request::validate(
            [
                'title' => ['required', 'max:50']
            ]
        );

        Auth::user()->todo()->create(
            // Request::validate(
            //     [
            //         'title' => ['required', 'max:50'],
            //         'description' => ['required', 'max:50'],
            //         'status' => ['required', 'max:50']
            //     ]
            // )
            [
                'user_id' => Auth::user()->id,
                'title' => Request::get('title'),
                'description' => Request::get('title'),
                'status' => 'not done'
            ]
        );

        return Redirect::route('todos')->with('success', 'Todo created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $todo->update(
            Request::validate([
                'status' => ['required', 'max:50'],
            ])
        );

        // $status = $request->status ? 'done' : '';
        //
        // Request::validate([]);
        // $todo->update(
        //     $request->all()
        //     // $request->validate(
        //     //     [
        //     //         'status' => ['required', 'max:50'],
        //     //     ]
        //     // )
        // );
        return Redirect::back()->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $this->authorize('update', $todo);
        $todo->delete();
        return Redirect::back()->with('success', 'Deleted.');
    }
}
