<template>
    <h1>{{ header }}</h1>
    <div>
             <small> <slot>no general slot passed</slot></small>
     <small style="color:red"> <slot name="specific"> no specific slot passed</slot></small>

    </div>
  
</template>

<script>

export default {
    props : ['header']
}
</script>