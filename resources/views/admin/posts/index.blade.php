@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="w-75 pt-3">
                        <a href="{{route('posts.create')}}" class="btn btn-block btn-primary w-25">
                            Добавить пост
                        </a>
                    </div>
                     <div class="col-12 pt-3">
                         <div class="card-body table-responsive p-0">
                             <table class="table table-hover text-nowrap w-50">
                                 <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Название</th>
                                     <th colspan="3" class="text-center">Действия</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($posts as $post)
                                 <tr>
                                     <td>{{$post->id}}</td>
                                     <td>{{$post->title}}</td>
                                     <td class="text-center"><a href="{{route('posts.show',$post->id)}}"><i class="fas fa-eye"></i></a></td>
                                     <td class="text-center"><a href="{{route('posts.edit',$post->id)}}"><i class="fas fa-pen"></i></a></td>
                                     <td class="text-center">
                                         <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                             @csrf
                                             @method('delete')
                                             <button type="submit" class="border-0 p-0"><i class="fas fa-trash"></i></button>
                                         </form>
                                     </td>
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

