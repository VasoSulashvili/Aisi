<template lang="">
  <div class="card bg-base-100 shadow-xl cursor-pointer col-span-4 text-center">
    
    <figure>
      <img :src="image" :alt="title" />
    </figure>
      <div class="card-body">
        <h2 class="card-title">{{ title }}</h2>
      </div>
  </div>
</template>

<script>
export default {
    props: {
        title: String,
        image: String,
    }
}
</script>
<style lang="">
    
</style>