<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ZScoreController extends Controller
{
    public function hitung(Request $request)
    {
        try {
            $request->validate([
                'umur' => 'required|integer|min:0|max:60',
                'tinggi' => 'required|numeric',
                'jenis_kelamin' => 'required|in:laki,perempuan'
            ]);
        } catch (ValidationException $e) {
            // return validation errors (422) so frontend can show them
            return response()->json(['errors' => $e->errors()], 422);
        }

        $umur = $request->input('umur');
        $tinggi = $request->input('tinggi');
        $gender = $request->input('jenis_kelamin');

        $filename = $gender === 'perempuan' ? 'tbu_female.json' : 'tbu_male.json';
        $filePath = storage_path('app/who_lms/' . $filename);

        try {
            if (!file_exists($filePath)) {
                Log::error("WHO file not found: " . $filePath);
                return response()->json(['error' => "Data WHO tidak tersedia untuk gender '$gender'. File tidak ditemukan."], 500);
            }

            $json = file_get_contents($filePath);
            $whoData = json_decode($json, true);

            if (!is_array($whoData)) {
                Log::error("WHO file json invalid: " . $filePath); // Changed from $file to $filePath to reflect new variable
                return response()->json(['error' => "File WHO rusak / tidak valid JSON."], 500);
            }

            if (!isset($whoData[$umur])) {
                return response()->json(['error' => "Data WHO untuk umur $umur bulan tidak ditemukan"], 404);
            }

            $L = $whoData[$umur]['L'];
            $M = $whoData[$umur]['M'];
            $S = $whoData[$umur]['S'];

            $z = ($L != 1)
                ? (pow($tinggi / $M, $L) - 1) / ($L * $S)
                : ($tinggi - $M) / ($S * $M);

            if ($z < -3) $kategori = "Severe Stunting";
            elseif ($z < -2) $kategori = "Stunting";
            elseif ($z > 3) $kategori = "Very Tall";
            elseif ($z > 2) $kategori = "Tall";
            else $kategori = "Normal";

            return response()->json([
                'z_score' => round($z, 2),
                'kategori' => $kategori
            ]);

        } catch (\Exception $e) {
            Log::error('ZScoreController error: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['error' => 'Internal server error. Cek log aplikasi.'], 500);
        }
    }
}
