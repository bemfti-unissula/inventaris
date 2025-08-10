<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use League\Flysystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use TaffoVelikoff\ImageKitAdapter\ImagekitAdapter;
use ImageKit\ImageKit;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Storage::extend('imagekit', function ($app, $config) {
            // Log the ImageKit configuration for debugging
            \Log::info('ImageKit Configuration:', [
                'public_key' => $config['public_key'],
                'url_endpoint' => $config['url_endpoint'],
                'private_key_exists' => !empty($config['private_key'])
            ]);
            
            $adapter = new ImagekitAdapter(

                new ImageKit(
                    $config['public_key'],
                    $config['private_key'],
                    $config['url_endpoint'] // Changed from endpoint_url to url_endpoint
                ),

                $options = [ // Optional
                    'purge_cache_update'    => [
                        'enabled'       => true,
                        'endpoint_url'  => $config['url_endpoint'] // Changed from endpoint_url to url_endpoint
                    ]
                ] 

            );

            $filesystem = new Filesystem($adapter);
            return new FilesystemAdapter($filesystem, $adapter, $config);
        });
        
        // Force HTTPS in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        
        // Set default pagination view
        Paginator::defaultView('vendor.pagination.tailwind');
        Paginator::defaultSimpleView('vendor.pagination.simple-tailwind');
    }
}
