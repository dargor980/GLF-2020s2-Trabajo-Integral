<template>
    <div id="particles-js">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="row container-fluid">
                    <!--NOMBRE-->
                    <div class="col-md-4">
                        <div class="navbar-brand fredoka textocolor">Trabajo Integral: Hoja de Rutas</div>
                    </div>
                    <!--/NOMBRE-->
            
                    <!--OPCIONES NAVBAR-->
                    <div class="col-md-8 justify-content-end float-right">
                        <div class="collapse navbar-collapse float-right"  id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link lato textocolor" href="#" @click="mostrarHome">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link lato textocolor" href="#" @click="mostrarGrafo" >Hoja de Rutas</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link lato textocolor" href="#" @click="mostrarIntegrantes">Integrantes</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar navbar-expand-lg float-right">
                            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon textocolor"></span>
                            </button>
                        </div>
                    </div>
                    <!--/OPCIONES NAVBAR-->
                </div>
            </div>
        </nav>
        
        <home v-if="controlvista===1"></home>
        <integral v-if="controlvista===2"></integral>
        <integrantes v-if="controlvista===3"></integrantes>
    </div>
</template>

<script>
export default {
    data() {
        return {
            controlvista: 2,
            

        }
    },
    
    mounted(){
        this.$nextTick(() => {
        this.initParticlesJS()
        })
    },
    
    methods:{
        initParticlesJS () {
            particlesJS('particles-js', {
                'particles': {
                'number': {
                    'value': 25,
                    'density': {
                    'enable': true,
                    'value_area': 600
                    }
                },
                'color': {
                    'value': '#ffffff'
                },
                'shape': {
                    'type': 'circle',
                    'stroke': {
                    'width': 0,
                    'color': '#ffffff'
                    },
                    'polygon': {
                    'nb_sides': 5
                    },
                    'image': {
                    'src': 'img/algogenerico.png',
                    'width': 1000,
                    'height': 1000
                    }
                },
                'opacity': {
                    'value': 0.5,
                    'random': false,
                    'anim': {
                    'enable': false,
                    'speed': 1,
                    'opacity_min': 0.1,
                    'sync': false
                    }
                },
                'size': {
                    'value': 10,
                    'random': true,
                    'anim': {
                    'enable': true,
                    'speed': 80,
                    'size_min': 0.1,
                    'sync': false
                    }
                },
                'line_linked': {
                    'enable': true,
                    'distance': 400,
                    'color': '#ffffff',
                    'opacity': 0.4,
                    'width': 2
                },
                'move': {
                    'enable': true,
                    'speed': 5,
                    'direction': 'none',
                    'random': false,
                    'straight': false,
                    'out_mode': 'out',
                    'bounce': false,
                    'attract': {
                    'enable': false,
                    'rotateX': 600,
                    'rotateY': 1200
                    }
                }
                },
                'interactivity': {
                'detect_on': 'canvas',
                'events': {
                    'onhover': {
                    'enable': false,
                    'mode': 'repulse'
                    },
                    'onclick': {
                    'enable': true,
                    'mode': 'push'
                    },
                    'resize': true
                },
                'modes': {
                    'grab': {
                    'distance': 800,
                    'line_linked': {
                        'opacity': 1
                    }
                    },
                    'bubble': {
                    'distance': 800,
                    'size': 80,
                    'duration': 2,
                    'opacity': 0.8,
                    'speed': 3
                    },
                    'repulse': {
                    'distance': 400,
                    'duration': 0.4
                    },
                    'push': {
                    'particles_nb': 4
                    },
                    'remove': {
                    'particles_nb': 2
                    }
                }
                },
                'retina_detect': true
            })
        },
        mostrarHome(){
            this.controlvista=1;
        },

        mostrarGrafo(){
            this.controlvista=2;
        },

        mostrarIntegrantes(){
            this.controlvista=3;
        },
    }
}
</script>

<style>
    

    #grafito{      
        position: relative;   
    }
</style>