<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    } // End Index

    public function create()
    {
        return view('admin.pages.create');
    } // End create

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['bail', 'required', 'string' ,'max:150'],
            'desc' => ['bail', 'required'],
            'content' => ['bail', 'required'],
            'image' => ['bail', 'required', 'image' , 'max:1024'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('pages',$request->image);
        }

        Page::create($data);

        notify()->info('اضافة الصفحة إلى قاعدة البيانات','تم بنجاح');

        return redirect(route('pages.index'));
    } // End store

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    } // End edit

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'name' => ['bail', 'required', 'string' ,'max:150'],
            'desc' => ['bail', 'required'],
            'content' => ['bail', 'required'],
            'image' => ['bail', 'image' , 'max:1024'],
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($page->image);
            $data['image'] = Storage::put('pages',$request->image);
        }

        $page->update($data);

        notify()->info('تعديل الصفحة بقاعدة البيانات','تم بنجاح');

        return redirect(route('pages.index'));
    } // End update

    public function destroy(Page $page)
    {
        $page->delete();
        notify('تم حذف الصفحة بنجاح');

        return back();
    }
}
