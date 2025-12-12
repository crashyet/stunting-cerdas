<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AnalyzeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|max:10240', // max 10MB
        ]);

        $file = $request->file('image');

        // Kirim ke service Node yang menangani Gemini (http://localhost:3000/analyze)
        $client = new Client([
            'base_uri' => env('NODE_ANALYZE_URL', 'http://localhost:3000'),
            'timeout'  => 30.0,
        ]);

        try {
            $response = $client->request('POST', '/analyze', [
                'multipart' => [
                    [
                        'name'     => 'image',
                        'contents' => fopen($file->getRealPath(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ],
                ],
                // jika service Node memakai header khusus, tambahkan di sini
                // 'headers' => ['Authorization' => 'Bearer '.env('NODE_SECRET')],
            ]);

            $body = (string) $response->getBody();
            // Node server harus mengembalikan JSON array (sesuai prompt).
            // Jika node mengembalikan raw JSON -> decode
            $data = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                // Jika gagal decode, tampilkan raw text untuk debugging
                return back()->withErrors(['node_error' => 'Response bukan JSON valid'])->with('raw_output', $body);
            }

            // Sukses: tampilkan hasil
            return view('analyze.result', ['result' => $data, 'raw' => $body]);

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('Guzzle error: '.$e->getMessage());
            $msg = $e->getMessage();
            if ($e->hasResponse()) {
                $msg = (string) $e->getResponse()->getBody();
            }

            return back()->withErrors(['request_error' => 'Gagal menghubungi service analyze: '.$msg]);
        } catch (\Exception $e) {
            Log::error('Analyze error: '.$e->getMessage());
            return back()->withErrors(['fatal' => 'Terjadi error: '.$e->getMessage()]);
        }
    }
}

