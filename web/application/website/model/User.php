<?php
namespace app\website\model;
use think\Model;

class User extends Model
{
    public function group()
    {
        return $this->hasOne('group','uid','id');
    }
}