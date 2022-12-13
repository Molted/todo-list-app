<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\TodoResource;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $perPage = $request->query('per_page', 10);
        $orderBy = $request->query('order_by', 'ASC');
        $sortBy = $request->query('sort_by', 'id');

        if (empty($request->query('offset', 0))) {
            $offset = ($page - 1) * $perPage;
        } else {
            $offset = $request->query('offset', 0);
        }

        $items = Todo::offset($offset)->limit($perPage)
            ->orderBy($sortBy, $orderBy)
            ->get();
        $totalTodos = $items->count();
        // $totalPages = ceil($totalTodos / $perPage);

        $todos = new LengthAwarePaginator($items, $totalTodos, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return TodoResource::collection($todos);
    }

    // protected function offset() {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
       $todo = Todo::create($request->all());

       return response()->json([
            'status' => true,
            'message' => "Todo created successfully.",
            'todo' => $todo
       ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response()->json([
            'status' => "success",
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Todo updated successfully.",
            'todo' => $todo
       ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json([
            'status' => true,
            'message' => "Todo deleted successfully.",
       ], 200);
    }
}
