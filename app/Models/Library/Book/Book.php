<?php

namespace App\Models\library\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setup\Class\StudentClass;
use App\Models\library\Author\Author;
use App\Models\library\Bookcategory\BookCategory;
use App\Models\library\Publisher\Publisher;

class Book extends Model
{
    public function classes()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }

    public function bookcategory()
    {
        return $this->belongsTo(BookCategory::class,'bookcategory_id','id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id','id');
    }
}
