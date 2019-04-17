<!-- Pull in our global style sheet -->
<style lang="scss" src="global">
#app {
  height: 100vh;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
  opacity: 0;
}

</style>
<style>
.backs{
  position: absolute;
    top: 0px;
    width: 100%;
    background: #4444446b;
    display: flex;
    margin: 0px;
    padding: 0px;
    left: 0;
    align-items: center;
    justify-content: center;
    height: 100%;
}
</style>
<template>
  <div id="app">
    <transition name="fade" mode="out-in">
      <router-view/>
    </transition>
  </div>
</template>
