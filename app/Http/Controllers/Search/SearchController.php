<?php
/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Search\Traits\PreSearchTrait;
use App\Models\CategoryField;
use App\Models\Category;
use Torann\LaravelMetaTags\Facades\MetaTag;

class SearchController extends BaseController
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
	public function index($catSlug, $location, $locationID)
	{
		view()->share('isIndexSearch', $this->isIndexSearch);

		// Pre-Search
		$subCatSlug = Category::getCategory($catSlug);
		if($subCatSlug->parent_id == 0){
			$this->getCategory($subCatSlug->id);

			// Get Category nested IDs
			$catNestedIds = (object)[
				'parentId' => 0,
				'id'       => $subCatSlug->id,
			];

			// Category data
			$searchData = [	
				'catSlug' => 0,
				'subCatSlug' => $subCatSlug->id,
				'city' => $locationID,
			];
		} else {
			$catData = Category::getPCategory($subCatSlug);
			$this->getCategory($catData->id, $subCatSlug->id);

			// Get Category nested IDs
			$catNestedIds = (object)[
				'parentId' => $catData->id,
				'id'       => $subCatSlug->id,
			];

			// Category data
			$searchData = [	
				'catSlug' => $catData->id,
				'subCatSlug' => $subCatSlug->id,
				'city' => $locationID,
			];
		}
		
		// Get Custom Fields
		$customFields = CategoryField::getFields($catNestedIds);
		view()->share('customFields', $customFields);
		if ($locationID) {
			$city = $this->getCity($locationID);
		}
		
		// Pre-Search values
		$preSearch = [
			'city'  => (isset($city) && !empty($city)) ? $city : null,
			'admin' => (isset($admin) && !empty($admin)) ? $admin : null,
		];
		
		// Search
		$search = new $this->searchClass($preSearch);
		$data = $search->fetch($searchData);
		// Export Search Result
		view()->share('count', $data['count']);
		view()->share('paginator', $data['paginator']);
		
		// Get Titles
		$title = $this->getTitle();
		$this->getBreadcrumb();
		$this->getHtmlTitle();
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $title);

		return view('search.serp');
	}
}
