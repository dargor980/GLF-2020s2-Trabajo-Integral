<template>
    <div class="container mt-5 pt-4">
        <button class="btn btn-lg btn-success" @click="texto"> Test</button>
        
    </div>
    
</template>

<script>
export default {
    data(){
        return{

            dato:"Escribiendo algo sin sentido para probar que la vida no tiene sentido cuando esta patas para arriba como una tortuga dada vuelta luego de pelear contra zeus",
            
        }
    },
    created(){
        
    },

    methods:{
        texto(){
            
            var foo= new Blob([this.dato],{type: "text/plain;charset=utf-8"});
            FileSaver.saveAs(foo, "hello world.txt");
        },
    },
}
</script>

 

  

  


