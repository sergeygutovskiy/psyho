<?php

namespace App\Http\Controllers;

use App\Models\QuestionnaireQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show_register_page()
    {
        $questions = QuestionnaireQuestion::all();

        return view('pages.users.register', [
            'questions' =>  $questions,
        ]);
    }

    public function show_login_page()
    {
        return view('pages.users.login');
    }

    public function show_account_page()
    {
        $user = Auth::user();

        return view('pages.users.account', [
            'user' => $user,
        ]);
    }

    public function show_update_page()
    {
        $user = Auth::user();

        return view('pages.users.update', [
            'user' => $user,
        ]);
    }

    public function register(Request $request)
    {
        $fio = $request->input('fio');
        $email = $request->input('email');
        $age = $request->input('age');
        $sex = $request->input('sex');
        $password = $request->input('password');
        $questions = $request->collect('questions');

        $user = User::create([
            'fio' => $fio,
            'email' => $email,
            'password' => Hash::make($password),
            'age' => $age,
            'sex' => $sex,
        ]);

        $user->questions()->attach($questions);

        Auth::login($user);
        return redirect()->route('users.account.page');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ( Auth::attempt([ 'email' => $email, 'password' => $password ]) )
        {
            return redirect()->route('users.account.page');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login');
    }

    public function update(Request $request)
    {
        $fio = $request->input('fio');
        $email = $request->input('email');
        $age = $request->input('age');
        $sex = $request->input('sex');
        $password = $request->input('password');
        $password_confirm = $request->input('password-confirm');

        if ( $password && $password !== $password_confirm ) 
        {
            return redirect()->back();
        }

        $user = Auth::user();

        if ( $password )
        {
            $user->update([
                'fio' => $fio,
                'email' => $email,
                'sex' => $sex,
                'age' => $age,
                'password' => Hash::make($password),
            ]);
            return redirect()->route('users.account.page');
        }

        $user->update([
            'fio' => $fio,
            'email' => $email,
            'sex' => $sex,
            'age' => $age,
        ]);
        return redirect()->route('users.account.page');
    }

    public function show_account_tests($user_id)
    {
        $user = User::find($user_id);
        
        return view('pages.users.tests', [
            'tests' => $user->tests,
            'user' => $user
        ]);
    }

    public function show_account_info($user_id)
    {
        $user = User::find($user_id);
        $questions = QuestionnaireQuestion::all();

        return view('pages.users.info', [
            'user' => $user,
            'questions' => $questions
        ]);
    }
}
