<?php


namespace App\Presenter;


use Illuminate\Database\Eloquent\Model;

class UserPresenter
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function name()
    {
        if($this->model->nickname === auth()->user()->nickname){
            return 'You';
        }
        return $this->model->nickname;
    }
    public function avator()
    {
        return 'https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=50';
    }
}
