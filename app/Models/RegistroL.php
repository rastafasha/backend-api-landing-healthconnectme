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
        'pais',
        'phone',
        'rrss',
        'type_id',
        'speciality',
        'email',
        'rrss',
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
    const TESTING = 'TESTING';
    const FREETIME = 'FREETIME';
    
    public static function statusTypes()
    {
        return [
            self::APPROVED, self::PENDING, self::REJECTED,
            self::TESTING, self::FREETIME
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
