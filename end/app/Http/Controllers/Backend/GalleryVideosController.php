<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryVideo;

class GalleryVideosController extends Controller
{
    public function index()
    {
        //
        $videos = GalleryVideo::get();
        return view('backend.galleryVideos.videos_all',compact('videos'));

    }//end method
    public function create()
    {
        //
        return view('backend.galleryVideos.video_add');
    }//end method
    public function store(Request $request)
    {
        $request->validate([
            'youtube_link' => 'required'
        ]);
        $add = new GalleryVideo();
        $add->youtube_link  =  $this->getYoutubeEmbedUrl($request->youtube_link);
        $add->save();
        $notification = array(
            'message' => 'Video created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.video')->with($notification);
    }
    public function edit($id)
    {
        $video=GalleryVideo::findOrFail($id);
        if($video){
            return view('backend.galleryVideos.video_edit',compact('video'));
        }else{
            abort('404');
        }
    }
    public function update(Request $request){
        $request->validate([
            'youtube_link' => 'required'
        ]);
        $video_id = $request->id;
        $add = GalleryVideo::findOrFail($video_id);
        $add->youtube_link  =  $this->getYoutubeEmbedUrl($request->youtube_link);
        $add->save();
        $notification = array(
            'message' => 'Video Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.video')->with($notification);
    }
    function getYoutubeEmbedUrl($url){
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
   
       if (preg_match($longUrlRegex, $url, $matches)) {
           $youtube_id = $matches[count($matches) - 1];
       }
   
       if (preg_match($shortUrlRegex, $url, $matches)) {
           $youtube_id = $matches[count($matches) - 1];
       }
       return 'https://www.youtube.com/embed/' . $youtube_id ;
   }
    public function destroy($id){
        $video = GalleryVideo::findOrFail($id);
        //delete message from folder
        $video->delete();
        $notification = array(
            'message' => 'Video Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }//end method
}
