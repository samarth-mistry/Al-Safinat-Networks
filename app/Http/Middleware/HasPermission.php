<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {

        $_exist_role_user = \DB::table('role_user')
                        ->where('user_id',auth()->id())
                        ->exists();
        
        if( $_exist_role_user ) {

            $user_role = \DB::table('role_user')
                            ->where('user_id',auth()->id())
                            ->first();

            $controllerAction = class_basename(Route::currentRouteAction());
    
            $permission = false;
            $permission_id_id = 0;

            $permission_result = Permission::where('name',$controllerAction)
                                    ->exists();
            
            $permission_id = Permission::where('name',$controllerAction)
                                ->first();
    
            if(!$permission_result) {
                $permission_id_id = 0;
            }
            else {
                $permission_id_id = $permission_id->id;
            }
            
            $role_id = $user_role->role_id;
    
            $check_permission = \DB::table('permission_role')
                                ->where('role_id',$role_id)
                                ->where('permission_id',$permission_id_id)
                                ->exists();
    
            if($check_permission) {
    
                $permission = true;
    
                if($permission) {
                    return $next($request);
                }
    
                return abort(403);

            }else {
                return abort(403);
            }
        }else {
            return 'Unauthorized access!';
        }
    }
}
