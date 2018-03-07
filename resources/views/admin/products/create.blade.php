@extends('layouts.app')

@section('title', 'Bienvenido a App shop')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Regitro de productos</h2>

            <div class="team">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
             @endif
                    <form method="post" action="{{url('/admin/products')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre del producto</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    </div>
                                </div>

                                <div class="col-sm-4 ">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Precio</label>
                                        <input type="number" class="form-control" name="price" value="{{old('price')}}">
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Descripción corta</label>
                                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                                    </div>
                              </div>                            
                        </div>

                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_text"></textarea>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                 <button type ="submit" class="btn btn-primary">Registrar producto</button>
                                 <a href="{{url('admin/products')}}" class="btn btn-default">Cancelar</a>                            
                         </div>
                        </div>
                    </form>
            
            </div>
        </div>

        </div>


    
    </div>

</div>

@include('includes.footer')

</div>
@endsection