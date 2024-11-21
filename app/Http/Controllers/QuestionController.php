<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function submitQuestion(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'question_text' => 'required|string',
        ]);

        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'You need to be logged in to submit a question');
        }

         // Jika pengguna adalah admin, tampilkan pesan berbeda
        if (auth()->user()->role == 'admin') {
            return redirect()->back()->with('error', 'Admin accounts cannot submit questions.');
        }

        // Simpan pertanyaan ke database
        $question = new Question();
        $question->user_id = auth()->id();
        $question->project_id = 1;  // Sesuaikan dengan ID project Anda
        $question->email = auth()->user()->email;  // Ambil email dari user yang sedang login
        $question->question_text = $validated['subject'] . "\n\n" . $validated['question_text'];
        $question->save();

        // Redirect ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'Your question has been submitted successfully!');
    }
}
