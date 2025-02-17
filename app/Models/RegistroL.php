<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistroL extends Model
{
    use HasFactory;
    
    protected $table = 'registros_landing';
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
