<?php
/* This model was made manually not using the artisan framework
*/
namespace App\Models;

class listing {
    public static function all(){
      return [
            
        [
            'id' =>1,
            'title' => 'listing one',
            'description' => 'oneto dewjodjsxzs'
        ],
              [
                'id' =>2,
                'title' => 'listing two',
                'description' => 'onas'
              ],

              [
                'id' =>3,
                'title' => 'listing three',
                'description' => 'JOINUVGTCGs'
              ]
              ];
    }

    public static function find($id){
       $listings = self::all();

foreach($listings as $listing){
    if($listing['id'] == $id){
        return $listing;
    }
}
    }
}