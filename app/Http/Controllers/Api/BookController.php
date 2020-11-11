<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAllBooks() {
        $books = Book::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
    }

    public function getBook($id) {
        if (Book::where('id', $id)->orWhere('name','LIKE', '%'.$id.'%')->exists()) {
        $book = Book::where('id', $id)->orWhere('name','LIKE', '%'.$id.'%')->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
        return response()->json([
            "message" => "Libro no encontrado"
        ], 404);
        }
    }


    



    public function createBook(Request $request) {
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();

        return response()->json([
        "message" => "Libro creado corrrectamente"
        ], 201);
    }

    public function updateBook(Request $request, $id) {
        if (Book::where('id', $id)->exists()) {
        $book = Book::find($id);
            
        $book->name = is_null($request->name) ? $book->name : $request->name;
        $book->author = is_null($request->author) ? $book->author : $request->author;
        $book->save();

        return response()->json([
            "message" => "Actualizado correctamente"
        ], 200);
        } else {
        return response()->json([
            "message" => "Error actualizando el libro con id: ".$id
        ], 404);
        }
    }
    public function deleteBook ($id) {
        if(Book::where('id', $id)->exists()) {
        $book = Book::find($id);
        $book->delete();

        return response()->json([
            "message" => "Libro eliminado correctamente"
        ], 202);
        } else {
        return response()->json([
            "message" => "Libro no encontrado"
        ], 404);
        }
    }

    
}
