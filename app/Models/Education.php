<?php

namespace App\Models;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = ['id'];

    protected $hidden = ['id'];
    protected $table = 'educations';

public function user()
{
    return $this->belongsTo(User::class);
}

protected $fillable = [
    'user_id',
    'degree',
    'institution',
    'year_of_graduation',
];
public function getRouteKeyName()
{
    return 'uuid'; // Use 'id' if you are using 'id' as the primary key
}


}
