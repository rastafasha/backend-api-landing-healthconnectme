<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Jobs\PaymentRegisterJob;
use App\Mail\NewWorkshopRegisterMail;
use Illuminate\Support\Facades\Mail;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'ciudad',
        'phone',
        'speciality',
        'email',
        'facebook',
        'instagram',
        'dondeSeEntero',
        'address',
        'terminos',
        'status',
    ];

    const APPROVED = 'APPROVED';
    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    
    public static function statusTypes()
    {
        return [
            self::APPROVED, self::PENDING, self::REJECTED
        ];
    }

     /*
    |--------------------------------------------------------------------------
    | functions
    |--------------------------------------------------------------------------
    */

    protected static function boot(){

        parent::boot();

        static::created(function($doctor){

            // PaymentRegisterJob::dispatch(
            //     $user
            // )->onQueue("high");

        Mail::to('registro@health-connect.me')->send(new NewWorkshopRegisterMail($doctor));

        });


    }


    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    public static function search($query = ''){
        if(!$query){
            return self::all();
        }
        return self::Where('email', 'like', "%$query%")
        ->orWhere('nombre', 'like', "%$query%")
        ->get();
    }
}
