<?php 
    namespace App\Services;
    use App\Models\AdminSideMenu;

    class AdminSidebarService{
        public function getAdminSidebarPermissions($user_id){
            return AdminSideMenu::where("id", 1)->first();
        }
    }
?>