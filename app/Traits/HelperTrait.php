<?php

namespace App\Traits;

trait HelperTrait
{
    public function uploadImages($request)
    {
        // $img = time() . md5(uniqid()) . "." . $imageRequest->guessExtension();
        // $path = $imageRequest->storeAs($placeMove, $img, 'public');

        // return  '/storage/'.$path;
        $path = $request->file('image')->store('avatars');
 
        return $path;

    }

}
