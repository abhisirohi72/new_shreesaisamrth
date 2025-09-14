<?php 
    namespace App\Services;
    use App\Models\UserSideMenu;

    class UserSidebarService{
        public function getUserSidebarPermissions($user_id){
            return UserSideMenu::where("id", 1)->first();
        }
    }
?>