<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\AdminSidebarService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AdminSidebarMiddleware
{
    protected $adminSidebarService;

    public function __construct(AdminSidebarService $adminSidebarService)
    {
        $this->adminSidebarService= $adminSidebarService;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userId = Auth::id(); // Get authenticated user ID
            $permissions = $this->adminSidebarService->getAdminSidebarPermissions($userId);
            View::share('sidebarPermissions', $permissions);
        }
        return $next($request);
    }
}
