<?php

namespace App\Http\Controllers\Backend\Library\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\library\Book\Book;
use App\Models\library\Bookcategory\BookCategory;
use App\Models\library\Publisher\Publisher;
use App\Models\library\Author\Author;
use App\Models\Setup\Class\StudentClass;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function BookView()
    {
        $data['allData'] = Book::all();
        return view('backend.main-section.page.library.book.book_view',$data);
    }

    public function BookAdd()
    {
        $data['book'] = Book::all();
        $data['class'] = StudentClass::all();
        $data['bookcategory'] = BookCategory::all();
        $data['author'] = Author::all();
        $data['publisher'] = Publisher::all();
        return view('backend.main-section.page.library.book.book_add',$data);
    }
    public function BookStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'author_id' => 'max:191',
            'isbn' => 'required',
            'bookcategory_id' => 'max:191',
            'publisher_id' => 'max:191',
            'price' => 'max:191',
            'class_id' => 'max:191',
        ]);
        $data = new Book();
        $data->name = $request->name;
        $data->author_id = $request->author_id;
        $data->isbn = $request->isbn;
        $data->bookcategory_id = $request->bookcategory_id;
        $data->publisher_id = $request->publisher_id;
        $data->price = $request->price;
        $data->class_id  = $request->class_id;
        $data->save();
        return redirect()->route('book.view');
    }

    public function BookEdit($id)
    {
        $data['editData'] = Book::find($id);
        $data['book'] = Book::all();
        $data['class'] = StudentClass::all();
        $data['bookcategory'] = BookCategory::all();
        $data['author'] = Author::all();
        $data['publisher'] = Publisher::all();
        return view('backend.main-section.page.library.book.book_edit',$data);
    }

    public function BookUpdate(Request $request,$id)
    {
        $data = Book::find($id);
        $validateData = $request->validate([
            'name' => 'required',
            'author_id' => 'max:191',
            'isbn' => 'required',
            'bookcategory_id' => 'required',
            'publisher_id' => 'max:191',
            'price' => 'required',
            'class_id' => 'max:191',
        ]);
        $data->name = $request->name;
        $data->author_id = $request->author_id;
        $data->isbn = $request->isbn;
        $data->bookcategory_id = $request->bookcategory_id;
        $data->publisher_id = $request->publisher_id;
        $data->price = $request->price;
        $data->class_id = $request->class_id;
        $data->save();
        return redirect()->route('book.view');
    }

    //-----------------------------------------------ajax Delete------------------------------------------------------------

    public function destroy($id)
    {
        $all = Book::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'book Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No book Found.'
            ]);
        }
    }

}
