<?php

namespace App\Models\Library\Bookissue;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\library\Author\Author;
use App\Models\library\Book\Book;
use App\Models\library\Bookcategory\BookCategory;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Session\StudentSession;
use App\Models\User;

class Bookissue extends Model
{
    public function classes()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function group()
    {
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }

    public function session()
    {
        return $this->belongsTo(StudentSession::class,'session_id','id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id','id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
