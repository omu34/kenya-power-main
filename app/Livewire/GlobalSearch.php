<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\BasicBanner;
use App\Models\Breadcrumb;
use Livewire\Component;
use App\Models\Footer;
use App\Models\Currency;
use App\Models\FeaturedNews;
use App\Models\LatestGallery;
use App\Models\LatestNews;
use App\Models\LatestVideos;
use App\Models\HeaderNavigation;
use App\Models\QuickLinks;
use App\Models\Socials;
use App\Models\Tags;
use App\Models\TopNavbar;

class GlobalSearch extends Component
{
    public $query;
    public $results;

    public function mount()
    {
        $this->query = '';
        $this->results = collect();
    }

    public function updatedQuery()
    {
        $this->search();
    }

    public function search()
    {
        $this->results = collect();

        if (strlen($this->query) > 2) {
            $socialResults = Socials::where('name', 'like', "%{$this->query}%")
                ->orWhere('url', 'like', "%{$this->query}%")
                ->get();
            $quickLinkResults = QuickLinks::where('name', 'like', "%{$this->query}%")
                ->orWhere('url', 'like', "%{$this->query}%")
                ->get();
            $footerResults = Footer::where('name', 'like', "%{$this->query}%")
                ->orWhere('url', 'like', "%{$this->query}%")
                ->get();
            $currencyResults = Currency::where('name', 'like', "%{$this->query}%")
                ->orWhere('code', 'like', "%{$this->query}%")
                ->get();
            $headerNavigationResults = HeaderNavigation::where('main_page_name1', 'like', "%{$this->query}%")
                ->orWhere('main_page_name2', 'like', "%{$this->query}%")
                ->get();
            $bannerResults = Banner::where('main_page_name13', 'like', "%{$this->query}%")
                ->orWhere('main_page_name13', 'like', "%{$this->query}%")
                ->get();
            $basicBannerResults = BasicBanner::where('main_page_name13', 'like', "%{$this->query}%")
                ->orWhere('main_page_name13', 'like', "%{$this->query}%")
                ->get();
            $footerResults = Footer::where('main_page_name30', 'like', "%{$this->query}%")
                ->orWhere('main_page_name31', 'like', "%{$this->query}%")
                ->get();
            $breadcrumbResults = Breadcrumb::where('main_page_name26', 'like', "%{$this->query}%")
                ->orWhere('main_page_name26', 'like', "%{$this->query}%")
                ->get();
            $featuredNewsResults = FeaturedNews::where('main_page_name16', 'like', "%{$this->query}%")
                ->orWhere('main_page_name16', 'like', "%{$this->query}%")
                ->get();
            $latestNewsResults = LatestNews::where('main_page_name60', 'like', "%{$this->query}%")
                ->orWhere('main_page_name61', 'like', "%{$this->query}%")
                ->get();
            $latestVideosResults = LatestVideos::where('main_page_name11', 'like', "%{$this->query}%")
                ->orWhere('main_page_name60', 'like', "%{$this->query}%")
                ->get();
            $latestGalleryResults = LatestGallery::where('main_page_name23', 'like', "%{$this->query}%")
                ->orWhere('main_page_name24', 'like', "%{$this->query}%")
                ->get();
            $tagsResults = Tags::where('main_page_name71', 'like', "%{$this->query}%")
                ->orWhere('main_page_name72', 'like', "%{$this->query}%")
                ->get();
            $topNavbarResults = TopNavbar::where('name', 'like', "%{$this->query}%")
                ->orWhere('url', 'like', "%{$this->query}%")
                ->get();
                // $blogContentResults = BlogContent::where('main_page_name13', 'like', "%{$this->query}%")
                // ->orWhere('main_page_name13', 'like', "%{$this->query}%")
                // ->get();

            $this->results = $this->results
            ->merge($bannerResults)
            ->merge($footerResults)
            ->merge($currencyResults)
            ->merge($headerNavigationResults)
            ->merge($basicBannerResults)
            ->merge($footerResults)
            ->merge($latestVideosResults)
            ->merge($breadcrumbResults)
            ->merge($latestNewsResults)
            ->merge($featuredNewsResults)
            ->merge($currencyResults)
            ->merge($tagsResults)
            ->merge($latestGalleryResults)
            ->merge($topNavbarResults);
            // ->merge($currencyResults)
            // ->merge($tagsResults)
            // ->merge($latestGalleryResults)
            // ->merge($topNavbarResults);
            // ->merge($currencyResults);
        }
    }

    public function render()
    {
        return view('livewire.global-search');
    }
}

