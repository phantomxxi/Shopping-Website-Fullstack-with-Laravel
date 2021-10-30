<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

    public function setGateAndPolicyAccess()
    {
        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGateProduct();
        $this->defineGateSlider();
        $this->defineGateSetting();
        $this->defineGateUser();
        $this->defineGateRole();
    }

    public function defineGateCategory()
    {
        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    }

    public function defineGateMenu()
    {
        Gate::define('slider-list','App\Policies\MenuPolicy@view');
        Gate::define('slider-add','App\Policies\MenuPolicy@create');
        Gate::define('slider-edit','App\Policies\MenuPolicy@update');
        Gate::define('slider-delete','App\Policies\MenuPolicy@delete');
    }

    public function defineGateProduct()
    {
        Gate::define('slider-list','App\Policies\ProductPolicy@view');
        Gate::define('slider-add','App\Policies\ProductPolicy@create');
        Gate::define('slider-edit','App\Policies\ProductPolicy@update');
        Gate::define('slider-delete','App\Policies\ProductPolicy@delete');
    }

    public function defineGateSlider()
    {
        Gate::define('slider-list','App\Policies\SliderPolicy@view');
        Gate::define('slider-add','App\Policies\SliderPolicy@create');
        Gate::define('slider-edit','App\Policies\SliderPolicy@update');
        Gate::define('slider-delete','App\Policies\SliderPolicy@delete');
    }

    public function defineGateSetting()
    {
        Gate::define('slider-list','App\Policies\SettingPolicy@view');
        Gate::define('slider-add','App\Policies\SettingPolicy@create');
        Gate::define('slider-edit','App\Policies\SettingPolicy@update');
        Gate::define('slider-delete','App\Policies\SettingPolicy@delete');
    }

    public function defineGateUser()
    {
        Gate::define('slider-list','App\Policies\UserPolicy@view');
        Gate::define('slider-add','App\Policies\UserPolicy@create');
        Gate::define('slider-edit','App\Policies\UserPolicy@update');
        Gate::define('slider-delete','App\Policies\UserPolicy@delete');
    }

    public function defineGateRole()
    {
        Gate::define('slider-list','App\Policies\RolePolicy@view');
        Gate::define('slider-add','App\Policies\RolePolicy@create');
        Gate::define('slider-edit','App\Policies\RolePolicy@update');
        Gate::define('slider-delete','App\Policies\RolePolicy@delete');
    }




}
