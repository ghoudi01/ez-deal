<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Models\Story;
use App\Models\AppBanner;
use App\Models\AppSetting;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Stories\StoryTinyResource;
use App\Http\Resources\Constants\AppSettingResource;
use App\Http\Resources\HomeBanners\HomeBannerTinyResource;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $cityStories = Story::MyCityStory()->WhereDate('end_date', '>=', now())->active()->get();
        $data['cityStories'] = StoryTinyResource::collection($cityStories);

        ##################################### 
        
        $countryStories = Story::MyCountryStory()->WhereDate('end_date', '>=', now())->active()->get();
        $data['countryStories'] = StoryTinyResource::collection($countryStories);

        #####################################
        
        $homeBanners = AppBanner::MyStory()->WhereDate('end_date', '>=', now())->active()->get();
        $data['home_banners'] = HomeBannerTinyResource::collection($homeBanners); 

        #####################################

        $appSetting = AppSetting::get();
        $data['app_setting'] = AppSettingResource::collection($appSetting);

        return $this->respondWithCollection($data);
    }
}
