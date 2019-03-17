<?php

namespace App\Http\Middleware;

use Closure;

class BackendMenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 设置后台菜单
        $menus = [];
        foreach (backend_menus() as $menu) {
            $menus[] = $menu->name;
            $menus = array_merge($menus, $menu->children->map(function ($children) {
                return [
                    'text' => $children->name,
                    'url' => $children->url,
                ];
            })->toArray());
        }
        config(['adminlte.menu' => $menus]);
        return $next($request);
    }
}
