<template>
    <div class="container mt-5 pt-4">
        <h1 class="fredoka textocolor my-2">Ingrese Ubicaciones Importantes</h1>
        <div class="row">
            <div class="col-6">
                <form @submit.prevent="" class="cardaux textocolor p-3">
                    <h1 class="lato textocolor">Estacionamiento de Camiones</h1>
                    <div class="form-group">
                        <label for="id">Ingrese su ubicación (X,Y): </label> 
                        <input type="text" class="form-control"> 
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                    </div>
                </form>     
            </div>
            <div class="col-6">
                <form @submit.prevent="" class="cardaux textocolor p-3">
                    <h1 class="lato textocolor">Centros de Distribución</h1>
                    <div class="form-group">
                        <label for="id">Ingrese el id: </label> 
                        <input type="number" min="0" name="id" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="id">Ingrese su ubicación (X,Y): </label> 
                        <input type="text" class="form-control"> 
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                    </div>
                </form>     
            </div>
        </div>         
        <div class="row mt-5">
            <div class="col-6">
                <form @submit.prevent="" class="cardaux textocolor p-3">
                    <h1 class="lato textocolor">Camiones</h1>
                    <div class="form-group">
                        <label for="id">Ingrese el id: </label> 
                        <input type="number" min="0" name="id" class="form-control"> 
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                    </div>
                </form>     
            </div>
            <div class="col-6">
                <form @submit.prevent="" class="cardaux textocolor p-3">
                    <h1 class="lato textocolor">Puntos de Venta</h1>
                    <div class="form-group">
                        <label for="id">Ingrese el id: </label> 
                        <input type="number" min="0" name="id" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="id">Ingrese su ubicación (X,Y): </label> 
                        <input type="text" class="form-control"> 
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                    </div>
                </form>     
            </div>
        </div>
    </div>
    
</template>