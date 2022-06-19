<template>

<ItemTitle :header="h1title"> 

text for general slot 
<template v-slot:specific> text for specific slot</template>
</ItemTitle>


<div>
    <input type="text" v-model="newTask">
    <button class="btn btn-primary" @click="saveNewTask">save </button>
</div>

<table class="table table-bordered mt-5">
    <tbody>
    <tr  :class="{'table-success':item.compeleted_at , 'table-danger':!item.compeleted_at}" v-for="item in items">
    <!-- <tr  :class="`${ item.compeleted_at ? 'table-success' : 'table-info'}`" v-for="item in items"> -->

    <td>{{ item.title }}</td>
    <td>

            <span v-if="!item.compeleted_at">not done</span>
            <span v-else>{{ item.compeleted_at }}</span>


    </td>

    <td>
        
        
        <button  v-if="!item.compeleted_at" @click="markAsCompeleted(item)" class="btn btn-warning"> compelete</button>
        <button  v-else @click="markAsInompeleted(item)" class="btn btn-warning">incompelete</button>
    
    
    </td>
    <td><button class="btn btn-danger" @click="removeItem(item)">Remove</button></td>

    </tr>
    </tbody>
</table>
</template>

<script>
import axios from 'axios'
import ItemTitle from "./ItemTitle";

export default {
    components : { ItemTitle  } , 
    data (){
        return {
            h1title : 'index page',
            items : [] ,
            title : 'Item List Here ... :' , 
            amount : 1  , 
            newTask : ''
        }
    } , 
    methods : {

        saveNewTask(){
            axios.post('api/item/store' , {title : this.newTask}).then((response)=>{
                this.items.push(response.data.item)
            })

        } , 
        getItesm(){
            axios.get('api/item').then((response)=>{
                this.items = response.data.items ;
            })
        } ,
  
  
        async removeItem(item){

            let response = await axios.delete('api/item/' + item.id ) ; 
            this.items = this.items.filter((thisitem)=>{
                return item.id != thisitem.id 
            })
        } ,
  
  
        async markAsCompeleted(item){

            let response  = await axios.post('api/item/compelete/' + item.id ) ; 
            console.log(response.data.item.compeleted_at)
            item.compeleted_at = response.data.item.compeleted_at ;


        },
        async markAsInompeleted(item){

             let response  = await axios.post('api/item/incompelete/' + item.id ) ; 
            //item = response.data.item ;
            item.compeleted_at = response.data.item.compeleted_at ;

        },

    } ,
    mounted(){
        this.getItesm()
    }
}
</script>