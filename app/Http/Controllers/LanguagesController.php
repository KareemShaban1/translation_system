<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    //
    public function index(){
        $languages = Languages::all();

        return view('backend2.pages.languages.index',compact('languages'));
    }

    public function create(){


        return view('backend2.pages.languages.create');
        
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required'
        ]);
        Languages::create($request->all());

        return redirect()->route('languages.index');


        
        
    }

    public function edit($id){
        $language = Languages::findOrFail($id);

        return view('backend2.pages.languages.edit',compact('language'));
    }
    public function update(Request $request , $id){
        $language = Languages::findOrFail($id);

        $request->validate([
            'name'=>'required'
        ]);
        $language->update($request->all());

        return redirect()->route('languages.index');


    }

    public function destroy($id){
        $language = Languages::findOrFail($id);

        $language->delete();
        
        return redirect()->route('languages.index');

    }
}