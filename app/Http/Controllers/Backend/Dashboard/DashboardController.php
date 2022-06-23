<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\library\Book\Book;
use App\Models\User;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $count = User::count();
        $teacher = User::where('usertype','Teacher')->count();
        $student = User::where('usertype','Student')->count();
        $book = Book::count();
        return view('backend.main-section.body.index',compact('count','book','teacher','student'));
    }
}
