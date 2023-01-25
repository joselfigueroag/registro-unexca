<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
</head>
<body>
<div class="row">
    <div class="col-12" >
      <h3 class="text-center" ></h3>
      <table class="table table-striped mt-2 container-sm col-12 shadow-lg rounded ">
        <thead>
        <tr>
            
            <th scope="col">Venta</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cant</th>
            <th scope="col">Producto</th>
            <th scope="col">Total bs</th>
            <th scope="col">Total $</th>
            <th scope="col">Pagado</th>
            <th scope="col">deuda Bs/$</th>
          </tr>
          </thead>
        <tbody class="table table-light table-striped " id="ventas">
        </tr> 
            <tr> 
              <th scope="row" class="col-1"></th>
              <td class="col-1 small" ></td>
              <td class="col-1 small" ></td>
              <td class="col-1 small"></td>
              <td class="col-1 small"></td>
              <td class="col-1 small" ></td>
              <td class="col-1 small" ></td>
              <td class="col-1 small"><table class="table"><tr> <td></td><td></td></tr></table></td>
            </tr>
        </tbody>
      </table>
    </div>
    <div class="col-12">
    <h3 class="text-center" >Deuda Total</h3>
      <table class="table  table-striped mt-2 container-sm col-12 shadow-lg rounded ">
        <thead>
        <tr>
            
            
            <th scope="col" class="bg-danger text-light">Bs</th>
            <th scope="col" class="bg-danger text-light">$</th> 
          </tr>
          </thead>
        <tbody class="table table-light table-striped">
        </tr> 
            <tr>
              
              <td scope="col" class="col-1 fw-bold"></td>
              <td scope="col" class="col-1 fw-bold"></td>
            </tr>
        </tbody>
      </table>
</div>
  
</body>

</html>