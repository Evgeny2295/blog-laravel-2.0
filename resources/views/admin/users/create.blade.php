@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h3>Пользователи</h3>
                     <div class="col-12 pt-3">
                         <form action="{{route('users.store')}}" method="POST">
                             @csrf
                             <div class="form-group w-25">
                                 <label for="title">Имя</label>
                                 <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="Введите имя">
                                 <div class="text-danger">
                                     @error('name')
                                     {{$message}}
                                     @enderror
                                 </div>
                             </div>
                             <div class="form-group w-25">
                                 <label for="email">E-mail</label>
                                 <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Введите e-mail">
                                 <div class="text-danger">
                                     @error('email')
                                     {{$message}}
                                     @enderror
                                 </div>
                             </div>
                             <div class="form-group w-25">
                                 <label>Выберите роль</label>
                                 <select name="role" class="form-control">
                                     @foreach($roles as $role_id=>$role)
                                         <option value="{{$role_id}}" {{old('role')==$role_id? 'selected' : ''}}>{{$role}}</option>
                                     @endforeach
                                 </select>
                                 <div class="text-danger">
                                     @error('role')
                                     {{$message}}
                                     @enderror
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-primary">Добавить</button>
                         </form>
                     </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

