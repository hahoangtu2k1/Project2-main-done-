<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth.admin');
    }

    function index()
    {
        return view('admin.tuition.list');
    }

    function infoAdmin($id)
    {
        $rs = MyModel::infoAdmin($id);
        return view('admin.auth.info', ['rs' => $rs]);
    }

    function listAccount()
    {
        $rs = MyModel::listAccount();
        return view('admin.auth.list-account', ['rs' => $rs]);
    }

    function destroyAccount($id)
    {
        $res = MyModel::destroyAcount($id);
        return redirect('admin/list-account');
    }

    function acceptAccount($id)
    {
        $res2 = MyModel::acceptAccount($id);
        return redirect('admin/list-account');
    }

    function showFormStaff()
    {
        return view('admin.auth.create');
    }

    function createStaff(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
        ], [
            'name.required' => 'Họ tên không được để trống',
            'email.required' => 'Email không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại tối thiểu là 10 số',
            'phone.max' => 'Số điện thoại tối đa là 10 số',
            'address.required' => 'Địa chỉ không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $rs = MyModel::createStaff($name, $email, $phone, $address);
        Toastr::success('Thành công');

        return redirect('admin/list-account');
    }

    function updateAdmin(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $rs = MyModel::updateAdmin($id, $name, $email, $phone, $address);
        Toastr::success('Thành công');

        return redirect()->back();
    }

    function changePw($id)
    {
        $rs = MyModel::infoAdmin($id);
        return view('admin.auth.changepw', ['rs' => $rs]);
    }

    function updatePw(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|min:8',
            'renew_password' => 'required|same:new_password',
        ], [
            'password.required' => 'Nhập mật khẩu cũ',
            'new_password.required' => 'Nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu tối thiểu 8 kí tự',
            'renew_password.same' => 'Mật khẩu mới không khớp',
            'renew_password.required' => 'Nhập lại mật khẩu mới',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $password = $request->input('password');
        $new_password = $request->input('new_password');
        $renew_password = $request->input('renew_password');

        $pw = MyModel::updatePw($id, $password, $new_password);
        if ($pw == false) {
            Toastr::error('Mật khẩu cũ không chính xác');
        } else {
            Toastr::success('Đổi mật khẩu thành công');
        }
        return redirect()->back();
    }
}
