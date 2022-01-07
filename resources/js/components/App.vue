<template>
    <main>
        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Laravel Vue Crud App - TechvBlogs</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/" class="nav-item nav-link">Home</router-link>
                        <router-link exact-active-class="active" to="/category" class="nav-item nav-link">Category</router-link>
                    </div>
                </div>
            </div>
        </nav> -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Test Laravel Vue</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-if="login==1">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Link</a> -->
                    <router-link exact-active-class="active" to="/category" class="nav-item nav-link">Category</router-link>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->

                    <li class="nav-item dropdown" v-if="login==1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><button type="button" class="dropdown-item" @click="logout()">                             Salir</button></li>

                    </ul>
                    </li>                    
                    <li class="nav-item" style="font-size: 18px;" v-else>
                        <router-link :to="{name: 'Login'}" class="nav-link">
                            Login
                        </router-link>

                        
                    </li>
                    </ul>
                </div>
            </div>
            </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>
 
<script>
    export default {
        data() {
            return {  
                login: Number,         
            };
        },
        mounted() {
            this.login=  localStorage.getItem('login');
        },
        methods: {
            logout(){
                localStorage.clear();
                this.$swal('Cierre de sesión', 'se ha cerrado sesión satisfactoriamente!', 'success');
                setTimeout(function() {
                            window.location.href = "/Login";
                        }, 1500); 
            }
        }
    }
</script>