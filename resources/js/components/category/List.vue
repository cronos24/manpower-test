<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"categoryAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categorias</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody v-if="categories.length > 0">
                                <tr v-for="(category,key) in categories" :key="key">
                                    <td>{{ category.id }}</td>
                                    <td>{{ category.name }}</td>
                                    <td>
                                        <router-link :to='{name:"categoryEdit",params:{id:category.id}}' class="btn btn-success">Editar</router-link>
                                        <button type="button" @click="deleteCategory(category.id)" class="btn btn-danger">Borrar</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Categories Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"categorias",
    data(){
        return {
            categories:[]
        }
    },
    mounted(){
        this.getCategories()
    },
    methods:{
        async getCategories(){
            await this.axios.get('/api/categorias').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
        deleteCategory(id){
            if(confirm("Quiere borrar el registro ?")){
                this.axios.delete(`/api/categorias/${id}`).then(response=>{
                    this.getCategories()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>