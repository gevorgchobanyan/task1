<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'lastname',
        'consent',
        'created_at',
        'updated_at'
    ];


    public function addresses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Address::class);
    }

    //READ

    static function retrieveJoinedRecords(): \Illuminate\Support\Collection
    {
        return DB::table('users')
            ->join('addresses', 'users.id', '=', 'addresses.user_id')
            ->select('users.id', 'users.name', 'users.lastname', 'users.consent', 'addresses.state',
                    'addresses.city', 'addresses.street', 'addresses.apartment', 'addresses.postcode')
            ->get();
    }

}
