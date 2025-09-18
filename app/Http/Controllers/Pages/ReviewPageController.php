<?php

namespace App\Http\Controllers\Pages;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Models\Review;
use DB;
use Exception;
use Illuminate\Http\Request;

class ReviewPageController extends Controller
{
    protected Review $review;

    /**
     * @param Review $review
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }


    public function index()
    {
        $reviews = $this->review->query()->where('status', 'accepted')->with('media')->get();

        return view('site.reviews.review-page', compact('reviews'));
    }

    public function create()
    {
        return view('site.reviews.review-create-page');
    }

    public function sendReview(ReviewStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $review = $this->review->query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'review' => $request->review,
                'user_id' => auth()->id() ?? null,
                'status' => 'pending'
            ]);

            if ($request->hasFile('image')) {
                $review->addMediaFromRequest('image')->toMediaCollection('image');
            } else {
                $review->addMediaFromUrl('https://lgk-kuwait.com/storage/1/62308809a4b82_lgk-logo.svg')->toMediaCollection('image');
            }


            DB::commit();

            Alert::success(trans('website.global.success'), trans('website.global.review-success'))
                ->timerProgressBar();

            return redirect()->route('reviews');

        } catch (Exception $e) {
            DB::rollBack();

            Alert::error(trans('website.global.error'), trans('website.global.error-msg'))
                ->timerProgressBar();

            return redirect()->route('reviews');
        }
    }
}
