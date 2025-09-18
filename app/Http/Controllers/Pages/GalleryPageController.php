<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
    protected Gallery $gallery;

    /**
     * @param Gallery $gallery
     */
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }



    public function index($type)
    {

        $numberOfNewItems = $type == 'image' ? 9 : 4;

        $new_galleries = $this->gallery
            ->where('type', $type)
            ->orderBy('created_at', 'desc')
            ->with('media')
            ->paginate($numberOfNewItems, ['*'], 'new_page');


        $galleries = $this->gallery
            ->where('type', $type)
            ->latest()
            ->with('media')
            ->paginate(8, ['*'], 'all_page');

        $anotherImages = null; // Initialize to avoid undefined variable error
        if ($type == 'image') {
            $galleryIds = $new_galleries->pluck('id')->toArray(); // Get IDs from paginated galleries
            $anotherImages = $this->gallery
                ->where('type', $type)
                ->whereNotIn('id', $galleryIds) // Exclude gallery IDs
                ->latest()
                ->with('media')
                ->get();
        }

        if ($galleries->count() == 0 && $new_galleries->count() == 0) {
            return redirect()->route('home');
        }

        // dd($new_galleries);
        // dd($anotherImages);

        return view('site.gallery-page', compact('galleries', 'type', 'new_galleries', 'anotherImages'));
    }
}
