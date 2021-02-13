<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';

    protected $fillable = [
        'id',
        'user_id',
        'state',
        'city',
        'street',
        'apartment',
        'postcode',
        'created_at',
        'updated_at'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function retrieveRecordsById($user_id): \Illuminate\Support\Collection
    {

        return DB::table('addresses')
            ->select('state', 'city', 'street', 'apartment', 'postcode')
            ->where('user_id', '=', $user_id)
            ->get();

    }
}
