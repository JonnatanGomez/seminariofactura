@extends('brackets/admin-ui::admin.layout.default')

@section('title', 'umg')

@section('body')
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
        Facturar
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
        Listado
    </button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body" style="" id="headerBody">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-5">
                                    <label for="">Cliente</label>
                                    <br>
                                    <select class="form-control" id="clientesSelect">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <font id="totalSum" style="
                                    float: right;
                                    font-family: inherit;
                                    font-weight: 500;
                                    font-size: 45px;
                                    color: #26b99a;
                                    text-decoration: underline;">
                                00.00
                                </font>
                                <font style="
                                    float: right;
                                    color: #73879C;
                                    font-family: 'Helvetica Neue',Roboto,Arial,'Droid Sans',sans-serif;
                                    padding-top: 30px;
                                    font-weight: 700;
                                    padding-right: 15px;">
                                Total
                                </font>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Agregar Articulo</label>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-md-3">
                                <select class="form-control" id="productosSelect">
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success inputs" data-toggle="tooltip" data-placement="top" title="Agregar" onclick="addItem()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <div class="col" style="text-align: right;">
                                <button class="btn btn-primary inputs" data-toggle="tooltip" data-placement="top" title="Guardar" onclick="saveOp()">
                                    <i class="fa fa-save"></i> Guardar
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover table-listing">
                                            <thead>
                                                <tr>
                                                    <th>Articulo</th>
                                                    <th style="text-align: right;">Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaOp">                                        
                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
            <div class="col" style="text-align: right;">
                <button class="btn btn-success inputs" data-toggle="tooltip" data-placement="top" title="Guardar" onclick="actOp()">
                    <i class="fa fa-refresh"></i> Actualizar
                </button>
            </div>
            <br>
            <div class="col-12">
                <table class="table table-hover table-listing">
                    <thead>
                        <tr>
                            <th>Operacion</th>
                            <th>Nit</th>
                            <th>Cliente</th>
                            <th style="text-align: right;">Total</th>
                        </tr>
                    </thead>
                    <tbody id="tablaOpSel">                                                                                                                          
                    </tbody>
                </table>
            </div>
        </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalSave">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <font id="" style="
                              float: right;
                              font-family: inherit;
                              font-weight: 500;
                              font-size: 45px;
                              color: #26b99a;">
                        Guardado con exito!
                        </font>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>

<!-- <script src="./js/jquery.min.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        getClientes();        
        getProductos(); 
        actOp();       
    });

    function getClientes(){
        $.ajax({ 
            url: "http://localhost:8000/cliente",
            type: "GET",
            dataType: "json",
        }).then(function(data) {
            for (i = 0; i < data.length; i++) {
                $('#clientesSelect').append("<option value='"+data[i].id+"'>"+data[i].nit+" - "+data[i].nombre+"</option>");
            }
        });
    }
    
    var itemsCloud = [];
    function getProductos(){
        $.ajax({ 
            url: "http://localhost:8000/producto",
            type: "GET",
            dataType: "json",
        }).then(function(data) {            
            for (i = 0; i < data.length; i++) {
                $('#productosSelect').append("<option value='"+data[i].id+"'>"+data[i].nombre+" - Q"+data[i].precio+"</option>");
                itemsCloud.push(data[i]);
            }
        });
    }

    var total = 0;
    var items = [];
    function addItem(){
        var idProducto = $('#productosSelect').val();
        for (i = 0; i < itemsCloud.length; i++) {
            if(itemsCloud[i].id == idProducto){
                $('#tablaOp').append("<tr>"+
                                "<td>"+itemsCloud[i].nombre+"</td>"+
                                "<td>Q"+itemsCloud[i].precio+"</td>"+
                            "</tr>");
                total += parseFloat(itemsCloud[i].precio);
            }
        }
        items.push(idProducto);
        $("#totalSum").html((Math.round(total * 100) / 100).toFixed(2));
    }

    function saveOp(){
        if(items.length > 0){
            var idCliente = $('#clientesSelect').val();
        console.log(idCliente);
        console.log(items);
        console.log(total);
        $.ajax({ 
            url: "http://localhost:8000/operacion",
            type: "POST",
            dataType: "json",
            data:{
                "idcliente":idCliente,
                "total":total       
            }
        }).then(function(data) {  
            console.log(data);
            var idOp = data.id;          
            for (i = 0; i < items.length; i++) {
                $.ajax({ 
                        url: "http://localhost:8000/detalle",
                        type: "POST",
                        dataType: "json",
                        data:{
                            "idproducto":items[i],
                            "idoperacion":idOp
                        }
                    }).then(function(data) {            
                        console.log(data)
                        console.log(items.length)
                        if(i == items.length){
                            $("#modalSave").modal("show");
                            $('#clientesSelect').prop('selectedIndex',0);
                            $('#productosSelect').prop('selectedIndex',0);
                            $('#tablaOp').html('');
                            total = 0;
                            items = [];
                            $("#totalSum").html((Math.round(total * 100) / 100).toFixed(2));
                        }
                    });
                }
            });
        }        
    }

    function actOp(){
        $('#tablaOpSel').html("");
        $.ajax({ 
            url: "http://localhost:8000/operacion",
            type: "GET",
            dataType: "json",
        }).then(function(data) {  
            console.log(data);
            var dataOps = data; 
            console.log(dataOps.length);
            $.ajax({ 
                url: "http://localhost:8000/detalle/",
                type: "GET",
                dataType: "json",
            }).then(function(data) {      
                
                var dataDetalle = data;

                for (var i = 0; i < dataOps.length; i++) {  

                        var headerOp = "<tr>"+
                                    "<td>#"+dataOps[i].id+"</td>"+
                                    "<td>"+dataOps[i].nit+"</td>"+
                                    "<td>"+dataOps[i].nombre+"</td>"+
                                    "<td>Q"+(Math.round(dataOps[i].total * 100) / 100).toFixed(2)+"</td>"+
                                "</tr>";
                        console.log(headerOp);

                        $('#tablaOpSel').append(headerOp);

                        var htmlDetalle = '<tr>'+
                            '<td colspan="4">'+
                            '<table class="table table-hover table-listing">'+
                            '<thead>'+
                            '<tr>'+
                            '<th>Productos</th>'+
                            '<th style="text-align: right;">Precio</th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>';
                        for (var j = 0; j < dataDetalle.length; j++) {    
                            if(dataDetalle[j].idoperacion == dataOps[i].id){
                                htmlDetalle +=
                                '<tr>'+
                                '<td>'+dataDetalle[j].nombre+'</td>'+
                                '<td>Q'+dataDetalle[j].precio+'</td>'+
                                '</tr>';
                            }
                        }
                        htmlDetalle +=                               
                        '</tbody>'+
                            '</table>'+
                            '</td>'+
                            '</tr>';

                        console.log(htmlDetalle);
                        $('#tablaOpSel').append(htmlDetalle);
                }
            });
        });
    }
</script>
@endsection