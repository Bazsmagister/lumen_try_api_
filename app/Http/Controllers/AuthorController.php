<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required|email|unique:authors',
            // 'location' => 'required|alpha'
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }


    // response() - global helper function that obtains an instance of the response factory
    // response()->json() - returns the response in JSON format.
    // 200 - HTTP status code that indicates the request was successful.
    // 201 - HTTP status code that indicates a new resource has just been created.
    // findOrFail - throws a ModelNotFoundException if no result is not found.
}
