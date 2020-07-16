<?php


namespace App;

class helper
{
    public function current_user()
    {
        return auth()->user();
    }


}
