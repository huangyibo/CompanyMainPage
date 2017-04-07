<?php

namespace CompanyMainPage\Models;
use Carbon\Carbon;

class Applicant extends BaseModel
{
    //
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public static function listApplicantsByPostId($post_id){
        if ($post_id){
            return static::where('post_id', $post_id)
                ->ordered()
                ->get();
        } else{
            return static::orderd()
                ->get();
        }
    }

    public function updatedAt()
    {
        return $this->formatDate($this->updated_at);
    }

    public function createdAt()
    {
        return $this->formatDate($this->created_at);
    }


    private function formatDate($date)
    {
        if (Carbon::now() < Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

}
