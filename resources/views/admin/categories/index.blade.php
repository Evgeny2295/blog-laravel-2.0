@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="w-75 pt-3">
                        <a href="{{route('categories.create')}}" class="btn btn-block btn-primary w-25">
                            Добавить категорию
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
                                 @foreach($categories as $category)
                                 <tr>
                                     <td>{{$category->id}}</td>
                                     <td>{{$category->title}}</td>
                                     <td class="text-center"><a href="{{route('categories.show',$category->id)}}"><i class="fas fa-eye"></i></a></td>
                                     <td class="text-center"><a href="{{route('categories.edit',$category->id)}}"><i class="fas fa-pen"></i></a></td>
                                     <td class="text-center">
                                         <form action="{{route('categories.destroy',$category->id)}}" method="POST">
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

