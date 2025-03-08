@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h3>Посты</h3>
                     <div class="col-12 pt-3">
                         <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             @method('PATCH')
                             <div class="form-group w-25">
                                 <label for="title">Название</label>
                                 <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" placeholder="Введите название">
                                 @error('title')
                                 {{$message}}
                                 @enderror
                             </div>
                             <div class="form-group w-75">
                                 <div style="font-weight: 700">Контент</div>
                                 <textarea id="content" name="content" style="width: 500px">{{$post->content}}</textarea>
                                 @error('content')
                                 {{$message}}
                                 @enderror
                             </div>
                             <div class="form-group w-25">
                                 <div>
                                     <img src="{{url('storage/' . $post->main_image)}}" alt="" style="width: 200px">
                                 </div>
                                 <label for="exampleInputFile">Изменить главное фото</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" name="main_image" class="custom-file-input" id="exampleInputFile">
                                         <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                     </div>
                                     <div class="input-group-append">
                                         <span class="input-group-text">Загрузить</span>
                                     </div>
                                 </div>
                                 @error('main_image')
                                 <div class="text-danger">{{$message}}</div>
                                 @enderror
                             </div>
                             <div class="form-group w-25">
                                 <label>Выберите категорию</label>
                                 <select name="category_id" class="form-control">
                                     @foreach($categories as $category)
                                         <option value="{{$category->id}}" {{$post->category_id==$category->id? 'selected' : ''}}>{{$category->title}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group w-25">
                                 <label>Выберите теги</label>
                                 <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                     @foreach($tags as $tag)
                                         <option value="{{$tag->id}}" {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id,$post->tags->pluck('id')->toArray()) ? 'selected' : ''}}>{{$tag->title}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <button type="submit" class="btn btn-primary">Обновить</button>
                         </form>
                     </div>
                </div>
            </div>
        </section>
    </div>
@endsection

