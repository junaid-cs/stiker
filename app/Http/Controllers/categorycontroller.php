<?php

namespace App\Http\Controllers;

use App\Models\categorymodel;
use App\Models\subcategorymodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class categorycontroller extends Controller
{
    public function index()
    {
        $show = categorymodel::orderBy('id', 'desc')->get();
        return view('admin/category', compact('show'));
    }

    public function storecategory(Request $req)
    {
        $store = new categorymodel;
        $store->name = $req->name;
        $file = $req->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $store->image = $req->file('image')->move('public/images', $filename);
        if ($req->hasFile('banner')) {
            $file = $req->file('banner');
            $filename1 = time() . '.' . $file->getClientOriginalExtension();
            $store->banner = $req->file('banner')->move('public/images/', $filename1);
        }
        $store->save();
        return redirect()->back()->with('status', 'Category Added Successfully');

    }

    public function editcategory($id)
    {
        $result = categorymodel::find($id);
        return response()->json(['show' => $result]);

    }

    public function updatecategory(Request $req)
    {
        $store = categorymodel::find($req->id);
        $store->name = $req->name;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $store->image = $req->file('image')->move('public/images', $filename);
        }
        if ($req->hasFile('banner')) {
            $file = $req->file('banner');
            $filename1 = time() . '.' . $file->getClientOriginalExtension();
            $store->banner = $req->file('banner')->move('public/images/', $filename1);
        }
        $store->update();
        return redirect()->back()->with('status', 'Category Updation Successfully');

    }
    public function deletecategory($id)
    {
        $result = categorymodel::find($id);
        $delete = public_path($result->image);
        if (File::exists($delete)) {
            File::delete($delete);
        }
        $deletebanner = public_path($result->banner);
        if (File::exists($deletebanner)) {
            File::delete($deletebanner);
        }
        $result->delete();
        return redirect()->back()->with('status', 'Category Deletion Successfully');

    }

// sub category
    public function subcategory()
    {
        $category = categorymodel::orderBy('id', 'desc')->get();

        $show = subcategorymodel::orderBy('id', 'desc')->get();
        return view('admin/subcategory', compact('show', 'category'));
    }

    public function storesubcategory(Request $req)
    {
        $store = new subcategorymodel;
        $store->category = $req->category;
        $store->subcategory = $req->subcategory;
        $file = $req->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $store->image = $req->file('image')->move('public/images', $filename);
        $store->save();
        return redirect()->back()->with('status', 'Sub Category Added Successfully');

    }
    public function editsubcategory($id)
    {
        $result = subcategorymodel::find($id);
        return response()->json(['show' => $result]);

    }

    public function updatesubcategory(Request $req)
    {
        $store = subcategorymodel::find($req->id);
        $store->category = $req->category;
        $store->subcategory = $req->subcategory;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $store->image = $req->file('image')->move('public/images', $filename);
        }
        $store->update();
        return redirect()->back()->with('status', 'Sub Category updated Successfully');

    }

    public function deletesubcategory($id)
    {
        $result = subcategorymodel::find($id);
        $delete = public_path($result->image);
        if (File::exists($delete)) {
            File::delete($delete);
        }
        $result->delete();
        return redirect()->back()->with('status', 'Sub Category Deletion Successfully');

    }

}
