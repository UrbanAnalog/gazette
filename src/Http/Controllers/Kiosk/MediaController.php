<?php
/**
 * @see https://gist.github.com/davejamesmiller/3236415
 * @see http://sneak.co.nz/projects/img-resizing/
 */

namespace UrbanAnalog\Gazette\Http\Controllers\Kiosk;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use UrbanAnalog\Gazette\Models\Media;

class MediaController extends Controller
{
    public function index()
    {
        return Media::orderBy('created_at', 'DESC')->paginate(20);
    }
}
