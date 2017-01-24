<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Policies;

use App\User;
use App\Peserta;
use Illuminate\Auth\Access\HandlesAuthorization;

class PesertaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //method ini dipanggil oleh BiodataController
    public function modify(User $user, Peserta $peserta)
    {
        return $user->id === $peserta->user_id;
    }
}
