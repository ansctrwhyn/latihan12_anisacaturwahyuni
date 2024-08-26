<?php

namespace App\Http\Controllers;

use App\Models\History_Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiAIController extends Controller
{
    // protected $geminiService;

    // public function __construct(GeminiService $geminiService)
    // {
    //     $this->geminiService = $geminiService;
    // }
    public function handleChat(Request $request)
    {
        $input = $request->input('message');

        $url = env('GEMINI_API_BASE_URL') . env('GEMINI_API_KEY');

        $payload = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $input],
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, $payload);

        $chatbotResponse = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';

        return redirect()->back()->with('response', $chatbotResponse);
    }

    public function index()
    {
        $response = History_Chat::all();
        return view('geminiai.index')->with('history_chat', $response);

    }

    public function store(Request $request)
    {
        $input = $request->input('message');

        $url = env('GEMINI_API_BASE_URL') . env('GEMINI_API_KEY');

        $payload = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $input],
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, $payload);

        $chatbotResponse = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';

        History_Chat::create([
            'send_chat' => $input,
            'get_chat' => $chatbotResponse
        ]);

        return redirect()->back()->with('response', $chatbotResponse);

    }
}
