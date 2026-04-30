<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display a listing of media.
     */
    public function index(Request $request)
    {
        $query = Media::latest();

        if ($request->has('search')) {
            $query->where('original_name', 'like', '%' . $request->search . '%');
        }

        if ($request->ajax()) {
            return response()->json($query->get());
        }

        $media = $query->paginate(30);
        return view('admin.media.index', compact('media'));
    }

    /**
     * Store a newly created media in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('media', $filename, 'public');

        $media = Media::create([
            'filename' => $filename,
            'original_name' => $originalName,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'path' => $path,
            'disk' => 'public',
        ]);

        if ($request->ajax()) {
            return response()->json($media);
        }

        return back()->with('success', 'Media uploaded successfully.');
    }

    /**
     * Remove the specified media from storage.
     */
    public function destroy(Media $media)
    {
        Storage::disk($media->disk)->delete($media->path);
        $media->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Media deleted successfully.');
    }
}
