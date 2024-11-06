<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class PersonalDetail extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = ['id'];

    protected $hidden = ['id'];

public function user()
{
    return $this->belongsTo(User::class);
}
protected $fillable = [
    'user_id',
    'name',
    'bio',
    'location',
];

}
