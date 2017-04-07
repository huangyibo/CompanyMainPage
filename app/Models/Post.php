<?php

namespace CompanyMainPage\Models;

use Carbon\Carbon;

class Post extends BaseModel
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setBodyOriginalAttribute($value)
    {
        $this->attributes['body'] = $value;
        $this->attributes['body_original'] = $value;
    }

    public function setCoverAttribute($file_name)
    {
        if (strpos($file_name, 'http') !== false) {
            $this->attributes['cover'] = $file_name;
        } else {
            $this->attributes['cover'] = $file_name;
        }
    }

    public function getCoverAttribute($file_name)
    {
        if (starts_with($file_name, 'http')) {
            return $file_name;
        }

        return $file_name;
    }

    public function scopeUnissued($query)
    {
        return $query->where('issue_id', '0');
    }

    public static function issuePostsByCid($cid, $issue_id = 0)
    {
        if ($issue_id == 0) {
            return static::where('category_id', $cid)
                ->unissued()
                ->ordered()
                ->recent()
                ->get();
        } else {
            return static::where('category_id', $cid)
                ->where('issue_id', $issue_id)
                ->ordered()
                ->recent()
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
