<?php

namespace App\Http\Controllers;

use App\Models\TestSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function start_session($test_id)
    {
        $user = Auth::user();

        $session = TestSession::create([
            'user_id' => $user->id,
            'test_id' => $test_id,
        ]);

        return redirect()->route('tests.sessions.page', [
            'id' => $session->id,
        ]);
    }

    public function show_session_page($id)
    {
        $session = TestSession::with('test.questions')->find($id);
        if ( $session->is_finished ) return redirect()->back();

        return view('pages.tests.sessions.index', [
            'session' => $session,
        ]);
    }

    public function finish_session($id, Request $request)
    {
        $session = TestSession::with(['test.questions', 'test.answers'])->find($id);
        if ( $session->is_finished ) return redirect()->back();

        $answers_ids = [];
        foreach ($session->test->questions as $question) {
            $answers_ids[] = (int) $request->input('question-' . $question->id)[0];
        }

        $answers_results = $session->test->answers
            ->filter(fn($answer) => in_array($answer->id, $answers_ids))
            ->map(fn($answer) => $answer->result_id)
            ->values()
        ;

        $result_id = $answers_results->countBy()->sortDesc()->keys()->first();
        
        $session->update([
            'result_id' => $result_id,
            'is_finished' => true,
        ]);

        $session->answers()->sync($answers_ids);

        return redirect()->route('tests.sessions.result.page', [
            'id' => $session->id,
        ]);
    }

    public function show_session_result_page($id)
    {
        $session = TestSession::with('result')->find($id);
        if ( !$session->is_finished ) return redirect()->back();

        return view('pages.tests.sessions.result', [
            'session' => $session,
        ]);
    }
}
