<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeliMembershipRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Atau ganti dengan logika otorisasi yang sesuai
    }

    public function rules()
    {
        return [
            'id_pengguna' => 'required|exists:pengguna_olahraga,id_pengguna',
        ];
    }
}
