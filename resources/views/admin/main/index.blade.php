@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$cntPosts}}</h3>
                                <p>Кол-во постов</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('posts.index')}}" class="small-box-footer">Больше информации<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$cntCategories}}</h3>
                                <p>Количество категорий</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{route('categories.index')}}" class="small-box-footer">Больше информации <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$cntUsers}}</h3>
                                <p>Количество пользователей</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('users.index')}}" class="small-box-footer">Больше информации<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><
        </section>
    </div>
@endsection

