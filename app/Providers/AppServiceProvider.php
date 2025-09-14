<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\AdminSidebarService;
use App\Services\UserSidebarService;
use App\Services\WebsiteSettingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan; // Import Artisan facade
use Illuminate\Support\Facades\Storage;


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
    public function boot(
        AdminSidebarService $adminSidebarService,
        UserSidebarService $userSidebarService,
        WebsiteSettingService $websiteSettingService
    ): void {
        // Clear cache automatically in local environment
        if (!Storage::exists('public')) {
            Artisan::call('storage:link');
        }
        if (app()->environment('local')) {
            Artisan::call('optimize:clear');
        }

        if (app()->runningInConsole()) {
            return;
        }

        View::composer('*', function ($view) use ($adminSidebarService, $userSidebarService, $websiteSettingService) {
            // if (Auth::check()) {
                $adminPermissions = $adminSidebarService->getAdminSidebarPermissions(Auth::id());
                $userPermissions = $userSidebarService->getUserSidebarPermissions(Auth::id());
                $faviconLogoDetails = $websiteSettingService->getFaviconLogo();
                // echo "<pre>";
                // print_r($faviconLogoDetails);
                // exit;
                $footerDetails = $websiteSettingService->getFooterDetails();

                // Log data instead of using `echo` and `exit`
                // \Log::info('Favicon Logo Details:', $faviconLogoDetails);

                $view->with([
                    'adminSidebarPermissions' => $adminPermissions,
                    'userSidebarPermissions' => $userPermissions,
                    'faviconDetails' => $faviconLogoDetails,
                    'footerDetails' => $footerDetails
                ]);
            // }
        });
    }
}
