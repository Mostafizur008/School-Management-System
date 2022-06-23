<?php

namespace App\Http\Controllers\Backend\Library\Bookissue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\library\Author\Author;
use App\Models\library\Book\Book;
use App\Models\library\Bookcategory\BookCategory;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Library\Bookissue\Bookissue;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class BookIssueController extends Controller
{
    public function IssueView()
    {
        $data['allData'] = Bookissue::select('user_id')->groupBy('user_id')->get();
        return view('backend.main-section.page.library.bookissue.issue',$data);
    }

    public function IssueAdd()
    {
        $data['class'] = StudentClass::all();
        $data['session'] = StudentSession::all();
        $data['group'] = StudentGroup::all();
        $data['author'] = Author::all();
        $data['book'] = Book::all();
        $data['user'] = User::all();
        return view('backend.main-section.page.library.bookissue.add',$data);
    }

    public function IssueStore(Request $request)
    {

        $countUser= count($request->book_id);
        if ($countUser !=NULL)
        {
            for ($i=0; $i <$countUser ; $i++)
            {
                $issue = new Bookissue();
                $issue->user_id = $request->user_id;
                $issue->class_id = $request->class_id[$i];
                $issue->session_id = $request->session_id[$i];
                $issue->id_no = $request->id_no[$i];
                $issue->book_id = $request->book_id[$i];
                $issue->author_id = $request->author_id[$i];
                $issue->start = $request->start[$i];
                $issue->end = $request->end[$i];
                $issue->return = $request->return[$i];
                $issue->status = $request->status[$i];
                $issue->save();
            }
        }

        return redirect()->route('issue.view');
    }

    public function IssueEdit($user_id)
    {
        $data['editData'] = Bookissue::where('user_id',$user_id)->orderBy('book_id','asc')->get();
        $data['class'] = StudentClass::all();
        $data['session'] = StudentSession::all();
        $data['group'] = StudentGroup::all();
        $data['author'] = Author::all();
        $data['book'] = Book::all();
        $data['user'] = User::all();
        return view('backend.main-section.page.library.bookissue.edit',$data);
    }
    public function IssueUpdate(Request $request,$user_id)
    {
        if($request->book_id == NULL)
        {
            //tostr notification
            return redirect()->route('issue.edit',$user_id);
        }else{
            $countUser = count($request->book_id);
            Bookissue::where('user_id',$user_id)->delete();
            for ($i=0; $i <$countUser ; $i++)
            {
                $issue = new Bookissue();
                $issue->user_id = $request->user_id;
                $issue->class_id = $request->class_id[$i];
                $issue->session_id = $request->session_id[$i];
                $issue->id_no = $request->id_no[$i];
                $issue->book_id = $request->book_id[$i];
                $issue->author_id = $request->author_id[$i];
                $issue->start = $request->start[$i];
                $issue->end = $request->end[$i];
                $issue->return = $request->return[$i];
                $issue->status = $request->status[$i];
                $issue->save();
            }
            return redirect()->route('issue.view');
        }
    }

    
    public function destroy($id)
    {
        $all = Bookissue::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Found.'
            ]);
        }
    }

    public function IssueDetail($user_id)
    {
        $data['detailData'] = Bookissue::where('user_id',$user_id)->orderBy('class_id','asc')->get();
        return view('backend.main-section.page.library.bookissue.detail',$data);
    }
}
