<?php
namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);

            if(!empty($data['tag_ids'])){
                $tagIds = $data['tag_ids'];

                unset($data['tag_ids']);
            }


            $post = Post::firstOrCreate($data);

            if(!empty($data['tag_ids'])){
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        }catch (\Exception $exception){
            abort(500);
        }

    }

    public function update($data,$post)
    {

        try{
            DB::beginTransaction();
            if(!empty($data['main_image'])){
                Storage::disk('public')->delete('/images',$post['main_image']);
                $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
            }

            if(!empty($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $post->update($data);

            if(!empty($data['tag_ids'])){
                $post->tags()->sync($tagIds);
            }

            DB::commit();

            return $post;
        }catch (\Exception $exception){
            abort(500);
        }

    }


}
