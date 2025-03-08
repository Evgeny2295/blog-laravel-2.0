@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-12 pt-3">
                         <div class="card-body table-responsive p-0">
                             <table class="table table-hover text-nowrap w-50">
                                 <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Название</th>
                                     <th colspan="2" class="text-center">Действия</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <tr>
                                     <td>{{$tag->id}}</td>
                                     <td>{{$tag->title}}</td>
                                     <td class="text-center"><a href="{{route('tags.edit',$tag->id)}}"><i class="fas fa-pen"></i></a></td>
                                     <td class="text-center">
                                         <form action="{{route('tags.destroy',$tag->id)}}">
                                             <button type="submit" class="border-0 p-0"><i class="fas fa-trash"></i></button>
                                         </form>
                                     </td>
                                 </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                </div>
            </div>
        </section>
    </div>
@endsection

