<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;
    // PersonalDetail.php, Education.php, WorkExperience.php, and GithubRepository.php

public function user()
{
    return $this->belongsTo(User::class);
}

}
