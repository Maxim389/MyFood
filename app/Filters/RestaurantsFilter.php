<?php

namespace App\Filters;

class RestaurantsFilter extends QueryFilter{
    public function search_field($search_string = ''){
        return $this->builder
            ->where('name', 'LIKE', '%'.$search_string.'%');
    }

    public function tag_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('tag_id', $id);
        });
    }
}