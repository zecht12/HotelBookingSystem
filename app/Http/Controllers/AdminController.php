<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     *  Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search= $request->search;
        $data= Admin::select('id','name','username','role')
        ->when($search,function($query,$search){
            return $query->where('name','like',"%{$search}%");
        })->orderBy('id')->paginate(10);
        $jumlahAdmin = Admin::where('role', 'admin')->count();
        $jumlahUser = Admin::where('role', 'user')->count();
        return view('admin.index', compact('data', 'jumlahAdmin', 'jumlahUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|alpha_dash|unique:admins',
            'password' => 'required|min:4|confirmed',
        ]);
        Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);
        return redirect()->route('admin.index')->with('status', 'store');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit',['row'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|alpha_dash|unique:admins,username,' . $admin->id,
            'password' => 'nullable|min:4|confirmed',
        ]);
        if ($request->password) {
            $arr =[
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ];
        } else {
            $arr =[
                'name' => $request->name,
                'username' => $request->username,
            ];
        }
        $admin->update($arr);
        return redirect()->route('admin.index')->with('status', 'update');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('status', 'destroy');
    }
    public function akun(){
        $admin = Auth::user();
        return view('admin.akun',['row'=>$admin]);
    }

    public function updateAkun(Request $request) {
        $admin = Auth::user();
        $request->validate([
            'name' => 'required',
            'username' => 'required|alpha_dash|unique:admins,username,' . $admin->id,
            'password' => 'nullable|min:4|confirmed',
        ]);
        if ($request->password) {
            $arr =[
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ];
        } else {
            $arr =[
                'name' => $request->name,
                'username' => $request->username,
            ];
        }
        $admin->update($arr);
        return back()->with('status', 'update');
    }
}
