<template>
    <div class="container mt-5 pt-4">
        
        <div class="row">
            <div class="col-8">
                <form @submit.prevent="" class="cardaux textocolor p-3" v-if="option1==true">
                    
                    <div class="form-group">
                        <label for="id">Total por distribuir </label> 
                        <input type="number" min="0" name="id" class="form-control" v-model="dTotal"> 
                    </div>
                    <div class="form-group">
                        <label for="id">Total camiones Día:</label> 
                        <input type="number" name="id" min="0" class="form-control" v-model="camionesD"> 
                    </div>


                    <div class="text-center">
                        <button id="btn1" class="btn btn-success btn-sm" type="submit" @click="homeControl1">Guardar</button>
                    </div>
                   
                </form>     
            </div>
            <div class="col-6" v-if="option2==true">
                <form @submit.prevent="" class="cardaux textocolor p-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Centros de distribucion</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" v-model="valor">
                            <option selected value="0">Selecciona...</option>
                            <option v-for="(item,index) in centrosDistribucion" :key="index" :value="item.id">{{item.N}}</option>
                        </select>
                    </div>
                    <div class="input-group mb-3" v-if="valor!=0">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Puntos de venta</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect02" v-model="valor2">
                            <option selected>Selecciona...</option>  
                            <option v-for="(item,index) in puntosVenta" :key="index" :value="item.id">{{item.N}}</option>
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
            <div class="col-6" v-if="option2==true">
                <h4 class="fredoka textocolor">Centros de Distribución</h4>
                <table class="table table-bordered cardaux textocolor">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">N</th>
                        <th scope="col">Coordenadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="(item, index) in centrosDistribucion" :key="index">
                            <th scope="row">{{item.N}}</th>
                            <td>X: {{item.x}}; Y: {{item.y}}</td>
                        </tr>
                        
                    </tbody>
                </table>
                <h4 class="fredoka textocolor">Puntos de Venta</h4>
                <table class="table table-bordered cardaux textocolor">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">N</th>
                        <th scope="col">Coordenadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="(item, index) in puntosVenta" :key="index">
                            <th scope="row">{{item.N}}</th>
                            <td>X: {{item.x}}; Y: {{item.y}}</td>
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
            puntosVenta:[],
            centrosDistribucion:[],
            dTotal:'',
            camionesD:'',
            camiones:[],
            option1:true,
            option2:false
        }
    },

    created(){
        axios.get('/puntosventa').then(response =>{
            this.puntosVenta=response.data;
        });
        axios.get('/centrosdistribucion').then(response =>{
            this.centrosDistribucion=response.data;
        })
    },

    methods:{
        homeControl1(){
            
            this.option1=false;
            this.option2=true;
            console.log(this.dTotal,this.camionesD);
            return
        },
        homeControl2(){
            
            this.option2=true;
            
            return
        },
        createCamiones(){
            var camion={id:'', centroDist:'', puntoVenta:''};
            for(var i=0; i<this.nCamiones;i++)
            {
                camion.id=i+1;
                this.camiones.push(camion);
                camion={id:'', centroDist:'', puntoVenta:''};
            }
        },

    },

}
</script>