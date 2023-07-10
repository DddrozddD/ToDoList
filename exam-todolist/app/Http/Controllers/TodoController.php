<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoStore;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $todos = Todo::orderBy('created_at', 'ASC')->get();
        $todos = Todo::orderBy('status', 'ASC')->get(); 


        return view('index', [
            'todos' => $todos
        ]);
        /* $todos = Todo::all();
        return view('index',[
        'todos' => $todos 
        ]);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoStore $request)
    {
        Todo::create($request->validated());

        return redirect()->route('home');
    }

    
    public function delete(Todo $item)
    {
            $item->delete();
            return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $item)
    {
        return view('edit', [
            'item'=>$item
        ]);
    }

    public function status(Todo $item)
    {
        switch($item->status){
            case "Todo": $item->update(['status'=>"InProgress"]);
            //dd($item);
            //я тут вообще не понимаю, почему не работает замена поля status
            //Если написать подобную строку: case "Todo": $id->update(["title"=>"Title23"]);
            //То оно работает
            break;
            case "InProgress": $item->update(['status'=>"Complete"]);break;
            case "Complete":$item->update(['status'=>"Todo"]);break;
          }
        
        return redirect()->route('home');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoStore $request, Todo $item)
    {
        $data =$request->validated();
        $item->update($data);

        return redirect()->route('home');
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
    }
}
