<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Search\Traits\PreSearchTrait;
use App\Models\CategoryField;
use App\Models\Category;
use App\Helpers\UrlGen;
use Torann\LaravelMetaTags\Facades\MetaTag;

class RedirectController extends BaseController
{
	use PreSearchTrait;
	
	public $isIndexSearch = true;
	
	protected $cat = null;
	protected $subCat = null;
	protected $city = null;
	protected $admin = null;
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
        // Pre-Search
        if (request()->filled('l') || request()->filled('location')) {
            $city = $this->getCity(request()->get('l'), request()->get('location'));
        } else {
            abort('301');
        }

		if (request()->filled('c')) {
            $cat = Category::getCategorySlug(request()->get('c'));
			if (request()->filled('sc')) {
                $subCat = Category::getCategorySlug(request()->get('sc'));
                $locationParams = [
                    'catSlug' => $subCat->slug,
                    'location'  => $city->name,
                    'locationId'  => $city->id,
                ];
			} else {
                $locationParams = [
                    'catSlug' => $cat->slug,
                    'location'  => $city->name,
                    'locationId'  => $city->id,
                ];
            }

            return redirect(UrlGen::category($locationParams, 2));
		} else {
            abort('301');
        }
	}
}
