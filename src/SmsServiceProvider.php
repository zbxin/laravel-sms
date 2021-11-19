<?php

namespace Zbxin\Sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * @return \Illuminate\Validation\Factory
     */

    protected function validator()
    {
        return $this->app['validator'];
    }

    /**
     *
     */

    public function boot()
    {
        $this->validator()->extend('zh_mobile', 'Zbxin\Sms\Validators\ZhMobileValidator@validator');
    }
}
