@extends('layouts.app')

@section('title', 'Imagenes de productos')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=cr4op&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Imagenes de productos "{{$product->name}}"</h2>
            <!--<form method="post" action="{{url('/admin/products/'.$product->id.'/images')}}" enctype="multipart/form-data" class="dropzone">
            {{csrf_field()}}
                <div class="fallback">
                    <input type="file" name="photo" required multiple >
                  <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
                    <a href="/admin/products" class="btn btn-default btn-round">Volver a listado de productos</a>
                </div>
                </form>-->
                <form action="{{url('/admin/products/'.$product->id.'/images')}}" class="dropzone" id="myDropzone">
                {{csrf_field()}}
                <div class="dz-default dz-message"><span>Arratra las imagenes o dale click</span></div>
                    
                </form>
               
            
                <hr>
            <div class="row">
                @foreach($images as $image)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="{{$image->url}}" width="250" height="250">
                                <form method="post" action="" >
                                    {{csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <button onclick="alertEliminar({{$image->id}},{{$product->id}})" type="button" class="btn btn-danger btn-round">Eliminar imagen</button>

                                   <!-- @if($image->featured)
                                        <button class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="imagen destacada">
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    @else
                                        <a href="{{url('/admin/products/'.$product->id.'/images/selectFav/'.$image->id)}}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                            <i class="material-icons">favorite</i>
                                        </a>
                                    @endif-->
                                    @if($image->featured)
                                      <button type="button" id="favorite_{{$image->id}}" class="btn btn-info btn-fab btn-fab-mini btn-round btn-favorite" data-toggle="tooltip" data-placement="top" title="Imagen destacada" onclick="favorite({{$image->id}},{{$product->id}})">
                                            <i class="material-icons">favorite</i>
                                        </button>
                                     @else
                                         <button type="button" id="favorite_{{$image->id}}" class="btn btn-primary btn-fab btn-fab-mini btn-round btn-favorite"  data-toggle="tooltip" data-placement="top" title="Destacar imagen" onclick="favorite({{$image->id}},{{$product->id}})">
                                                <i class="material-icons">favorite</i>
                                        </button>
                                    @endif
                                </form>
                              
                            </div>
                        </div>
                    </div>
                
                @endforeach
            </div>
        </div>

    </div>

</div>
<div id="nada"></div>
<!-- Modal -->
  <div class="modal fade" id="ModalEliminar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¿Estas seguro?</h4>
        </div>
        <div class="modal-body">
          <p>Se eliminara la imagen </p>
        </div>
        <div class="modal-footer">
             <form method="post" action="" >
                                    {{csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <input type="hidden" id="image_id_modal" name="image_id" value="">
                                    <input type="hidden" id="product_id_modal" name="product_id" value="">
                                    <button type="submit" class="btn btn-danger">Aceptar</button>

                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
        </div>
      </div>
      
    </div>
  </div>

@include('includes.footer')

@endsection
