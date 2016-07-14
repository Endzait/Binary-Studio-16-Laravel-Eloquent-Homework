<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //
    public function index(){
        $books=Book::paginate(10);
        return view('book/index', array('books'=>$books));
    }

    public function store(Request $request){
        $rules=array(
            'title'=>'required|alpha',
            'author'=>'required|alpha',
            'year'=>'required|digits:4',
            'genre'=>'required|alpha'
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Redirect::to('book/create')
                ->withErrors($validator)
                ->withInput();
        }else {


            $books = new Book();

            $books->title = $request->title;
            $books->author = $request->author;
            $books->year = $request->year;
            $books->genre = $request->genre;

            $books->save();
            Session::flash('message', 'Successfully added book');
            return Redirect::to('book');
        }
    }

    public function create(){
        $books=Book::All();
        return view('book/create', array('books'=>$books));
    }

    public function edit($id){
        $books=Book::find($id);
        return view('book/edit',array('book'=>$books));
    }
    public function update(Request $request, $id){
        $rules=array(
            'title'=>'required|alpha',
            'author'=>'required|alpha',
            'year'=>'required|digits:4',
            'genre'=>'required|alpha'
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Redirect::to('book/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else {


            $books =Book::find($id);

            $books->title = $request->title;
            $books->author = $request->author;
            $books->year = $request->year;
            $books->genre = $request->genre;

            $books->save();
            Session::flash('message', 'Successfully updated book');
            return Redirect::to('book/');
        }
    }
    public function show($id){

    }
    public  function destroy($id){
        $book=Book::find($id);
        $book->delete();
        return Redirect::to('book/');
    }
    /**
     * @param $id - book id
     * @param $uid - user id
     *
     * @return Redirect
     */
    public function passBook($id,$uid){
        Book::find($id)->users();
        return Redirect::to('book/');
    }


    /**
     * @param $id - book id
     *
     *
     * @return Redirect
     */
    public function selectUser($id){
        $book=\App\Book::find($id);
        $users=\App\User::paginate(10);
        return view('book/get',array('book'=>$book, 'users'=>$users));
    }


    /**
     * @param $id - book id
     * @param $uid - user id
     *
     * @return view
     */
    public function getBook ($id, $uid){
        $book=\App\Book::find($id);
        $users=\App\User::find($uid);
        $users->books()->save($book);
        $usbook=$users->books()->paginate(10);
        return view('book/index', array('books'=>$usbook));
    }







}
