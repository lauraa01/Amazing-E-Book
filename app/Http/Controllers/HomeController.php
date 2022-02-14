<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Account as AccountModel;
use App\Models\EBook as EBookModel;
use App\Models\Order as OrderModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $book = EBookModel::all();
        return view('home', ['book' => $book]);
    }

    public function bookdetail($title){
        $detail = EBookModel::where('ebook.title', $title)->get();

        return view('bookdetail', ['details' => $detail]);
    }

    public function cart()
    {
        $carts = OrderModel::join('ebook', 'order.ebook_id', 'ebook.ebook_id')
                            ->where('account_id', auth()->user()->id)->get();
        // dd($carts['id']);
        return view('cart', ['carts' => $carts]);
    }

    public function cart_delete($id) {
        OrderModel::where('order_id', $id)->delete();

        return redirect('cart');
    }

    public function cart_submit() {
        OrderModel::where('account_id', auth()->user()->id)->delete();

        return view('success');
    }

    public function rent($id)
    {
        $carts['account_id'] = auth()->user()->id;
        $carts['ebook_id'] = $id;
        // dd($carts);

        OrderModel::create([
            'account_id' => auth()->user()->id,
            'ebook_id' => $id
        ]);

        return redirect('cart');
    }

    public function profile()
    {
        $profile = AccountModel::join('role', 'account.role_id', 'role.role_id')
                                ->join('gender', 'account.gender_id', 'gender.gender_id')
                                ->where('account.id', '=', auth()->user()->id)
                                ->get();
        // dd($profile);
        return view('profile', ['profile' => $profile]);
    }

    public function updateProfile(Request $request)
    {
        $update = $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'middle_name' => ['nullable','string','max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender_id' => ['required'],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'min:9'],
            'display_picture_link' => ['required', 'mimes:jpeg,png,jpg'],
        ]);

        $image =  $update['display_picture_link'];
        $name = time() . '.' . $image->getClientOriginalExtension();;
        $location = 'images/' . $name;
        Storage::putFileAs('public/images', $image, $name);
        $update['display_picture_link'] = $location;

        $update['password'] = Hash::make($update['password']);
        // dd($update);
        AccountModel::where('id', auth()->user()->id)
                    ->update($update);

        return view('saved');
    }

    public function profile_submit() {
        $profile = AccountModel::join('role', 'account.role_id', 'role.role_id')
        ->join('gender', 'account.gender_id', 'gender.gender_id')
        ->where('account.id', '=', auth()->user()->id)
        ->get();
        return view('saved', ['profile' => $profile]);
    }

    public function maintenance()
    {
        $data = AccountModel::join('role', 'account.role_id', 'role.role_id')
                            ->get();
        return view('maintenance', ['data' => $data]);
    }

    public function viewRole($id) {
        $data = AccountModel::join('role', 'account.role_id', 'role.role_id')
                            ->where('account.id', $id)
                            ->get();
        return view('viewrole', ['data' => $data]);
    }

    public function updateRole(Request $request, $id) {
        AccountModel::join('role', 'account.role_id', 'role.role_id')
                    ->where('account.id', $id)
                    ->update([
                        'account.role_id' => $request->role_id
                    ]);

        return redirect()->back();
    }

    public function deleteUser(Request $request) {
        AccountModel::where('id', '=', $request->id)
                ->delete();
        return redirect('maintenance');
    }

    public function logout() {
        Auth::logout();

        Request()->session()->invalidate();

        Request()->session()->regenerateToken();

        return view('logout');
    }

}
