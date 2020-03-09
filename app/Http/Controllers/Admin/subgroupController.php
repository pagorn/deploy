<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\subgroup;
use App\subcategory;
use Illuminate\Http\Request;

class subgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $subgroup = subgroup::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $subgroup = subgroup::latest()->paginate($perPage);
        }

        return view('admin.subgroup.index', compact('subgroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $subcategory = subcategory::latest()->paginate(10);
        return view('admin.subgroup.create', compact('subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        subgroup::create($requestData);

        return redirect('admin/subgroup')->with('flash_message', 'subgroup added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subgroup = subgroup::findOrFail($id);

        return view('admin.subgroup.show', compact('subgroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subgroup = subgroup::findOrFail($id);
        $subcategory = subcategory::latest()->paginate(10);
        return view('admin.subgroup.edit', compact('subgroup','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $subgroup = subgroup::findOrFail($id);
        $subgroup->update($requestData);

        return redirect('admin/subgroup')->with('flash_message', 'subgroup updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        subgroup::destroy($id);

        return redirect('admin/subgroup')->with('flash_message', 'subgroup deleted!');
    }
}
