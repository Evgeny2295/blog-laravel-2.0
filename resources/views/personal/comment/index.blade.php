@extends('personal.layouts.personal')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12 pt-3">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap w-50">
                                <thead>
                                <tr>
                                    <th>Название поста</th>
                                    <th>Комментарий</th>
                                    <th colspan="3" class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->title}}</td>
                                        <td>{{$comment->comment}}</td>
                                        <td class="text-center"><a href="{{route('personal.comment.edit',$comment->id)}}"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

