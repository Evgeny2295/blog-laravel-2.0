@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h3>Теги</h3>
                     <div class="col-12 pt-3">
                         <form action="{{route('tags.store')}}" method="POST">
                             @csrf
                             <div class="form-group w-25">
                                 <label for="title">Название</label>
                                 <input type="text" class="form-control" name="title" id="title" placeholder="Введите название">
                             </div>
                             <div class="form-group w-25">
                                 @error('title')
                                 {{$message}}
                                 @enderror
                             </div>
                             <button type="submit" class="btn btn-primary">Добавить</button>
                         </form>
                     </div>
                </div>
            </div>
        </section>
    </div>
@endsection

