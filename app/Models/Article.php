<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $fillable = ["*"];

    public function images()
    {
        return $this->hasMany(Image::class, "article_id", "id");
    }

    public function setImgsAttribute($value)
    {
        $this->attributes["imgs"] = json_encode($value);
    }

    public function getImgsAttribute($value)
    {
        $ret = json_decode($value);
        return array_map(function ($it) {
            return \asset("/uploads/$it");
        }, $ret ?? []);
    }

    public function toArray()
    {
        return [
            "_id" => $this->id,
            "text" => $this->text,
            "images" => $this->images,
        ];
    }
}
