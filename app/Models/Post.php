<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'body',
];
    
    public function getPaginateByLimit(int $limit_count = 5)
{
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
}

    public function likes()
  {
    return $this->hasMany(Like::class, 'post_id');
  }
  
  public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }

}