<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WebinarTitle;

class ThemeOfWebinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(WebinarTitle::class, 'role_user');
    }
}
