<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\AccountRequest;
use App\Http\Requests\Teacher\WithdrawValidateRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\HistoryWithdrawal;
use App\Models\Mentor;
use App\Models\PercentagePayable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;

class AccountController extends Controller
{
    public function index()
    {
        $mentor = Auth::guard('mentor')->user();
        return view('screens.teacher.account.my-account', compact('mentor'));
    }
    public function update(AccountRequest $request, Mentor $mentor, $id)
    {
        $mentor = Auth::guard('mentor')->user($id);
        if (!$mentor) {
            return back();
        } else {
            $mentor->fill($request->except(['_method', '_token']));
            if ($request->hasFile('avatar')) {
                $imgPath = $request->file('avatar')->store('images');
                $imgPath = str_replace('public/', '', $imgPath);
                $mentor->avatar = $imgPath;
            }
            $mentor->update();
            return redirect()->back()->with('success', 'sửa thành công');
        }
    }

    public function password()
    {

        return view('screens.teacher.account.forgot-password');
    }

    public function forgotPassword(Request $request, $id)
    {

        $mentor = Auth::guard('mentor')->user($id);
        if ($request->password == '') {
            return redirect()->back()->with('error', 'Chưa nhập mật khẩu');
        }
        if (Hash::check($request->password, $mentor->password)) {
            if ($request->password_1 == $request->password_2) {
                $passnew = Hash::make($request->password_2);
                $us = new Mentor();
                $us->updatePass($id, $passnew);
                return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
            } elseif ($request->password_1 != $request->password_2) {
                return redirect()->back()->with('error1', 'mật khẩu mới không khớp');
            }
        } else {
            return redirect()->back()->with('error', 'Vui lòng nhập đúng mật khẩu !');
        }
    }



    public function commentMentor()
    {
        return view('screens.teacher.account.comment-teacher');
    }

    public function salaryBonus()
    {
        $mentor = auth()->guard('mentor')->user();
        $percentages = PercentagePayable::where('mentor_id', $mentor->id)
            ->with(['order_detail:id,price,course_id', 'order_detail.course:id,title,image,percentage_pay'])
            ->paginate(10);

        $course_count = Course::selectRaw('count(id) as number')->where('mentor_id', $mentor->id)->first()->number;
        return view('screens.teacher.account.salary-bonus', compact('percentages', 'mentor', 'course_count'));
    }

    public function formWithdraw($mentor_id)
    {
        $data = view('components.teacher.account.form-withdraw-money', compact('mentor_id'))->render();
        return response()->json($data);
    }

    public function withdraw(WithdrawValidateRequest $request, Mentor $mentor_id)
    {

        if ($request->money > $mentor_id->salary_bonus) {
            if ($request->ajax()) {
                session()->flash('failed', 'Tài khoản không đủ để rút');
                return response()->json(['failed' => true], 201);
            }
        }
        if ($request->money < 500000) {
            if ($request->ajax()) {
                session()->flash('failed', 'Rút tối thiểu 500,000đ');
                return response()->json(['failed' => true], 201);
            }
        }

        $money_later = $mentor_id->salary_bonus - $request->money;
        $mentor_id->salary_bonus = $money_later;
        $mentor_id->save();

        HistoryWithdrawal::create([
            'mentor_id' => $mentor_id->id,
            'money' => $request->money,
            'code' => 'PH' . random_int(100000, 999999),
            'time' => date('Y-m-d H:i:s'),
        ]);
        
        Mail::send('screens.email.teacher.withdraw-money', compact('request', 'mentor_id'), function ($email) use ($mentor_id) {
            $email->subject('Rút tiền');
            $email->to($mentor_id->email, $mentor_id->name);
        });

        if ($request->ajax()) {
            session()->flash('success', 'Rút tiền thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()->route('teacher.account.listWithdraw', $mentor_id->id)->with('Rút tiền thành công');

    }

    public function listWithdraw($mentor_id)
    {
        $min = HistoryWithdrawal::where('mentor_id', $mentor_id)->min('created_at');
        $max = HistoryWithdrawal::where('mentor_id', $mentor_id)->max('created_at');
        return view('screens.teacher.account.list-withdraw', compact('mentor_id','min','max'));
    }
    public function filterWithdraw(Request $request)
    {
        $withdraws = HistoryWithdrawal::where('mentor_id', $request->mentor_id)
            ->sortdata($request)
            ->time('history_withdrawals.created_at', $request)
            ->paginate($request->record);
        $html = view('components.teacher.account.list-withdraw', compact('withdraws'))->render();
        return response()->json($html, 200);
    }
}
