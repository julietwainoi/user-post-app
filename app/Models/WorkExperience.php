<?php

namespace App\Models;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
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
    'job_title',
    'company',
    'start_date',
    'end_date',

];
public function getRouteKeyName()
{
    return 'uuid'; // Use 'id' if you are using 'id' as the primary key
}




}
