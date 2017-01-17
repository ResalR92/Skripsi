<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesertaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Cek apakah CREATE atau UPDATE
        if ($this->method() == 'PATCH') {
            $foto_rules = 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png';
            $hp_rules = 'sometimes|numeric|digits_between:10,15|unique:peserta,no_hp,'.$this->get('id');
        } else {
            $foto_rules = 'required|image|max:500|mimes:jpeg,jpg,bmp,png';
            $hp_rules = 'sometimes|numeric|digits_between:10,15|unique:peserta,no_hp';
        }
        return [
            'id_jurusan' => 'required',
            'foto' => $foto_rules,
            'nama' => 'required|string|max:30',
            'tempat_lahir' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|string|max:20',
            'alamat' => 'required|string|max:250',
            'telepon' => 'sometimes|numeric|digits_between:10,15',
            'no_hp' => $hp_rules,
            'tahun_lulus' => 'required|numeric|digits:4',
            
            'nama_sekolah' => 'required|string|max:50',
            'alamat_sekolah' => 'required|string',

            'nama_ayah' => 'required|string|max:30',
            'tempat_lahir_ayah' => 'required|string|max:20',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required|string|max:20',
            'pendidikan_ayah' => 'required|string|max:20',
            'pekerjaan_ayah' => 'required|string|max:20',
            'gaji_ayah' => 'sometimes|string|max:20',
            'telepon_ayah' => 'sometimes|numeric|digits_between:10,15',
            'no_hp_ayah' => 'sometimes|numeric|digits_between:10,15',
            'alamat_ayah' => 'required|string|max:250',

            'nama_ibu' => 'required|string|max:30',
            'tempat_lahir_ibu' => 'required|string|max:20',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required|string|max:20',
            'pendidikan_ibu' => 'required|string|max:20',
            'pekerjaan_ibu' => 'required|string|max:20',
            'gaji_ibu' => 'sometimes|string|max:20',
            'telepon_ibu' => 'sometimes|numeric|digits_between:10,15',
            'no_hp_ibu' => 'sometimes|numeric|digits_between:10,15',
            'alamat_ibu' => 'required|string|max:250',

            'nama_wali' => 'sometimes|string|max:30',
            'tempat_lahir_wali' => 'sometimes|string|max:20',
            'tanggal_lahir_wali' => 'sometimes|date',
            'agama_wali' => 'sometimes|string|max:20',
            'pendidikan_wali' => 'sometimes|string|max:20',
            'pekerjaan_wali' => 'sometimes|string|max:20',
            'gaji_wali' => 'sometimes|string|max:20',
            'telepon_wali' => 'sometimes|numeric|digits_between:10,15',
            'no_hp_wali' => 'sometimes|numeric|digits_between:10,15',
            'alamat_wali' => 'sometimes|string|max:250',
        ];
    }
}
