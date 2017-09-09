<?php

namespace UrbanAnalog\Gazette\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Media;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'asset' => 'required|image|mimes:' . config('gazette.media.types') . '|max:' . config('gazette.media.max_size') . '',
        ]);

        $file = $request->file('asset');

        $store = $file->store(
            config('gazette.media.path'),
            config('gazette.media.disk')
        );

        $dimensions = getimagesize($file);

        $media = Media::create([
            'filename'   => $store,
            'alt_text'   => $file->getClientOriginalName(),
            'user_id'    => \Auth::user()->id,
            'dimensions' => $dimensions ? $dimensions[0] . 'x' . $dimensions[1] : null
        ]);

        return $media;
    }
}
