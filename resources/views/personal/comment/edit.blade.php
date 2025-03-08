@extends('personal.layouts.personal')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h3>Категории</h3>
                    <div class="col-12 pt-3">
                        <form action="{{route('personal.comment.update',$comment->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label for="comment">Комментарий</label>
                                <textarea name="comment" id="comment" cols="30" rows="10">{{$comment->comment}}</textarea>
                            </div>
                            <div class="form-group w-25">
                                @error('comment')
                                {{$message}}
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Изменить комментарий</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


