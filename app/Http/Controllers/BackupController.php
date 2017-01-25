<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jurusan;
use App\Peserta;
use App\Status;
use Excel;

class BackupController extends Controller
{
    public function index()
    {
    	return view('admin.backup.index');
    }


    //meng-ekspor file excel sebagai backup
    public function export(Request $request)
    {
        //trait validasi
    	$this->validate($request,[
    		'jurusan' => 'required',
    		'status'  => 'required',
    	]);
    	//mengambil data peserta berdasarkan filter->jurusan dan filter->status
    	$peserta_list = Peserta::whereIn('id_jurusan',$request->get('jurusan'))
    							->whereIn('id_status',$request->get('status'))
    							->get();
        //membuat file excel dengan nama-> Data PSB Panjatek
    	$excel = Excel::create('Data PSB SMK Panjatek-'.date('YmdHis'), function($excel) use($peserta_list){
            //Set Property
            $excel->setTitle('Data PSB SMK Panjatek')
                  ->setCreator(Auth::user()->name);
            //memberi nama Sheet
            $excel->sheet('Data PSB SMK Panjatek', function($sheet) use($peserta_list){
                $row = 1;
                //style sheeet excel
                $sheet->freezeFirstRow();
                //memakai border untuk header
                $sheet->cells('A1:AT1', function($cells) {
				    $cells->setFont(array(
					    'family'     => 'Calibri',
					    'size'       => '16',
					    'bold'       =>  true
					));
					$cells->setBorder('A1:AT1', 'thin');
				});
                //header
                $sheet->row($row,[
                    'No.Pendaftaran',
                    'Nama Lengkap',
                    'Status',
                    'Program Keahlian',
                    'Email',
                    'Tempat Lahir',
                    'Tanggal Lahir',
                    'Jenis Kelamin',
                    'Agama',
                    'Alamat',
                    'No.Telp',
                    'No.HP',
                    'Tahun Lulus',
                    'File Foto',

                    'Nama Sekolah Asal',
                    'Alamat Sekolah Asal',

                    'Nama Ayah',
                    'Tempat Lahir Ayah',
                    'Tanggal Lahir Ayah',
                    'Agama Ayah',
                    'Pendidikan Ayah',
                    'Pekerjaan Ayah',
                    'Penghasilan Ayah',
                    'No.Telp Ayah',
                    'No.HP Ayah',
                    'Alamat Ayah',

                    'Nama Ibu',
                    'Tempat Lahir Ibu',
                    'Tanggal Lahir Ibu',
                    'Agama Ibu',
                    'Pendidikan Ibu',
                    'Pekerjaan Ibu',
                    'Penghasilan Ibu',
                    'No.Telp Ibu',
                    'No.HP Ibu',
                    'Alamat Ibu',

                    'Nama Wali',
                    'Tempat Lahir Wali',
                    'Tanggal Lahir Wali',
                    'Agama Wali',
                    'Pendidikan Wali',
                    'Pekerjaan Wali',
                    'Penghasilan Wali',
                    'No.Telp Wali',
                    'No.HP Wali',
                    'Alamat Wali',

                ]);
                //data peserta PSB
                foreach($peserta_list as $peserta){
                    $sheet->row(++$row, [
                        $peserta->id,
                        $peserta->nama,
                        $peserta->status->nama,
                        $peserta->jurusan->nama,
                        $peserta->user->email,
                        $peserta->tempat_lahir,
                        $peserta->tanggal_lahir->format('d-m-Y'),
                        $peserta->jenis_kelamin,
                        $peserta->agama,
                        $peserta->alamat,
                        $peserta->telepon,
                        $peserta->no_hp,
                        $peserta->tahun_lulus,
                        $peserta->foto,

                        $peserta->sekolah->nama,
                        $peserta->sekolah->alamat,

                        $peserta->ayah->nama,
                        $peserta->ayah->tempat_lahir,
                        $peserta->ayah->tanggal_lahir->format('d-m-Y'),
                        $peserta->ayah->agama,
                        $peserta->ayah->pendidikan,
                        $peserta->ayah->pekerjaan,
                        $peserta->ayah->gaji,
                        $peserta->ayah->telepon,
                        $peserta->ayah->no_hp,
                        $peserta->ayah->alamat,

                        $peserta->ibu->nama,
                        $peserta->ibu->tempat_lahir,
                        $peserta->ibu->tanggal_lahir->format('d-m-Y'),
                        $peserta->ibu->agama,
                        $peserta->ibu->pendidikan,
                        $peserta->ibu->pekerjaan,
                        (!empty($peserta->ibu->gaji)) ? $peserta->ibu->gaji : '-',
                        $peserta->ibu->telepon,
                        $peserta->ibu->no_hp,
                        $peserta->ibu->alamat,

                        $peserta->wali->nama,
                        $peserta->wali->tempat_lahir,
                        (!empty($peserta->wali->tanggal_lahir)) ? $peserta->wali->tanggal_lahir->format('d-m-Y') : '-',
                        $peserta->wali->agama,
                        $peserta->wali->pendidikan,
                        $peserta->wali->pekerjaan,
                        (!empty($peserta->wali->gaji)) ? $peserta->wali->gaji : '-',
                        $peserta->wali->telepon,
                        $peserta->wali->no_hp,
                        $peserta->wali->alamat,
                    ]);
                }
            });
        })->export('xls');
    }
}