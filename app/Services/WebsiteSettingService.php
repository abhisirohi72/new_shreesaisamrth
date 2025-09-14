<?php 
    namespace App\Services;
    use App\Models\Favicon;
    use App\Models\FooterDetail;

    class WebsiteSettingService{
        public function getFaviconLogo(){
            return Favicon::where("id", 1)->first();
        }

        public function getFooterDetails(){
            return FooterDetail::where("id", 1)->first();
        }
    }
?>