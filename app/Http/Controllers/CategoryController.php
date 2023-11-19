<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255'],
            ['name.min' => 'A kategoria neve legalabb 3 hosszu legyen!'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Uj kategoria hozzaadva');
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));

    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|min:3|max:255'],
            ['name.min' => 'A kategoria neve legalabb 3 hosszu legyen!'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', ' Kategoria modositva');

    }

    public function destroy(string $id)
    {
           $category = Category::find($id);
           $category->delete();
           return redirect()->route('categories.index')->with('success', ' Kategoria torolve');



           
    }
}
