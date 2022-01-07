<?php

namespace Intoegy\SMS;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class SMSServiceProvider extends BaseServiceProvider
{
    /**
    * Register services.
    *
    * @return void
    */
    public function register() {
        //
        /* Register the service provider for the dependency.
     */
        $this->app->register(self::class);
        /*
     * Create aliases for the dependency.
     */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('SMS', self::class);
        // $loader->alias('ResourceServer', 'LucaDegasperi\OAuth2Server\Facades\ResourceServerFacade');

        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'sms');
    }

    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot() {
        //
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('sms.php'),
            ], 'sms-config');

        }
    }

    public static function send($to, $message) {
        if (is_array($to)) {
            $strMobiles = implode(',', $to);
        } else {
            $strMobiles = $to;
        }

        $url = "https://smssmartegypt.com/sms/api/?username={@username}&password={@password}&sendername={@sender}&message={@message}&mobiles={@mobiles}";

        $url = str_replace('{@username}', config('sms.username'), $url);
        $url = str_replace('{@password}', config('sms.password'), $url);
        $url = str_replace('{@sender}', config('sms.sender'), $url);
        $url = str_replace('{@mobiles}', $strMobiles, $url);
        $url = str_replace('{@message}', urlencode($message), $url);

        return json_decode(@file_get_contents($url));

    }
    public static function balance() {
        $url = "https://smssmartegypt.com/sms/api/getBalance?username={@username}&password={@password}";
        $url = str_replace('{@username}', config('sms.username'), $url);
        $url = str_replace('{@password}', config('sms.password'), $url);

        return json_decode(@file_get_contents($url));

    }
}