<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageKitService
{
    /**
     * Upload an image to ImageKit storage
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return array
     */
    public function uploadImageWithStorage($file, $folder)
    {
        try {
            // Generate unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
            // Get file contents
            $fileContents = file_get_contents($file->getRealPath());
    
            // Buat path (dengan folder jika ada)
            $path = $folder ? "{$folder}/{$filename}" : $filename;
    
            // Upload file using Storage facade with imagekit disk
            Storage::disk('imagekit')->put($path, $fileContents);
    
            // Get public URL of uploaded file
            $url = Storage::disk('imagekit')->url($path);
    
            return ['url' => $url, 'path' => $path];
        } catch (\Exception $e) {
            \Log::error('Storage ImageKit upload failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return ['error' => $e->getMessage()];
        }
    }
    

    /**
     * Delete an image from ImageKit storage
     *
     * @param string $path
     * @return bool
     */
    public function deleteImageWithStorage($path)
    {
        try {
            if (Storage::disk('imagekit')->exists($path)) {
                Storage::disk('imagekit')->delete($path);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            \Log::error('Storage ImageKit delete failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }
}
