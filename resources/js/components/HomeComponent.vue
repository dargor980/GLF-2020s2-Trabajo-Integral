<template>
    <div class="container mt-5 pt-4">
        <h1 class="fredoka textocolor my-2">Ingrese Ubicaciones Importantes</h1>
        <div class="row">
            <div class="col-4">
                <form @submit.prevent="" class="cardaux textocolor p-3">
                    
                    <div class="form-group">
                        <label for="id">Total por distribuir </label> 
                        <input type="number" min="0" name="id" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="id">Total camiones Día:</label> 
                        <input type="number" name="id" min="0" class="form-control"> 
                    </div>


                    <div class="text-center">
                        <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                    </div>
                </form>     
            </div>
            <div class="col-4">
                <form @submit.prevent="" class="cardaux textocolor p-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Centros de distribucion</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" v-model="valor">
                            <option selected value="0">Selecciona...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="input-group mb-3" v-if="valor!=0">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Puntos de venta</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect02" v-model="valor2">
                            <option selected>Selecciona...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="valor2!=0 && valor!=0">
                        <label for="id">Cantidad por distruibuir</label> 
                        <input type="number"  min="0" max="1000" name="id" class="form-control" placeholder="1000 max."> 
                    </div>
                    <div class="input-group mb-3" v-if="valor2!=0 && valor!=0">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02">Seleccione Camión</label>
                        </div>
                        
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Selecciona...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                    </div>                  
                </form>     
            </div>
            <div class="col-4">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Centros de distribucion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Puntos de venta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>         
    </div>
    
</template>

<script>
export default {
    data(){
        return{
            valor:'',
            valor2:'',
        }
    },

    created(){

    },

    methods:{

    },

}
</script>