@extends('layouts.app')

@section('title', 'Imagenes de productos')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Imagenes de productos seleccionado</h2>

            <div class="team">
                <div class="row">
                     <a href="/admin/products/create" class="btn btn-primary btn-round">Nuevo Producto</a>
 
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                       About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
        </div>
    </div>
</footer>

</div>





<!--MODAL-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title">Editar "{{$product->name}}"</h4>
            </div>
            <div class="modal-body">
             @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
             @endif
            <div id="loader"></div>
               <form id="form_edit" method="post" action="">
                        {{csrf_field()}}
                        <input id="id_edit" type="hidden" class="form-control" name="id_edit" value="vacio">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre del producto</label>
                                        <input id="name_edit" type="text" class="form-control" name="name" value="cargando...">
                                    </div>
                                </div>

                                <div class="col-sm-4 ">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Precio</label>
                                        <input id="price_edit" type="number" step="0.01" class="form-control" name="price" value="0">
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Descripción corta</label>
                                        <input id="description_edit" type="text" class="form-control" name="description" value="cargando...">
                                    </div>
                              </div>                            
                        </div>

                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <textarea id="long_description_edit" class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_text">cargando..</textarea>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-3">
                                 <button id="EditGuard" type ="submit" class="btn btn-primary">Guardar cambios</button>                            
                         </div>
                         <div class="col-sm-2 col-sm-offset-1">
                                 <a href="{{url('/admin/products')}}" type ="submit" class="btn btn-default">Cancelar</a>                            
                         </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 38.5781px; top: 6px; background-color: rgb(244, 67, 54); transform: scale(8.5);"></div><div class="ripple ripple-on ripple-out" style="left: 31.5781px; top: 7px; background-color: rgb(244, 67, 54); transform: scale(8.5);"></div><div class="ripple ripple-on ripple-out" style="left: 39.5781px; top: 26px; background-color: rgb(244, 67, 54); transform: scale(8.5);"></div></div></button>
            </div>
        </div>
    </div>
</div>
@endsection
