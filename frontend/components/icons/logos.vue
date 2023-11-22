<template>
  <div class="wrapper">
    <div class="track">
      <h1>This i sthe head</h1>
      <div class="logo">
        <img class="abject-cover" src="../../assets/logos/audi.png" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/benz.png" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/bmw.png" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/mazda.png" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/ford.png" />
      </div>
      <div class="logo ms-4">
        <img src="../../assets/logos/honda.png" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/subaru.jpeg" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/vw.png" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/toyota.png" />
      </div>
      <div class="logo">
        <img src="../../assets/logos/nissan.png" />
      </div>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
export default Vue.extend({
  name: "Logos",
});
</script>
<style scoped>
.wrapper {
  height: 130px;
  overflow: hidden;
  position: relative;
  width: 100%;
  display: flex;
  align-items: center;
  padding: 0 30px;
}

.wrapper:before,
.wrapper:after {
  content: "";
  position: absolute;
  height: 130px;
  width: 150px;
  z-index: 2;
}

.wrapper:after {
  right: 0;
  top: 0;
  transform: rotateZ(180deg);
}

.wrapper:before {
  left: 0;
  top: 0;
}

.wrapper .track {
  display: flex;
  width: calc(150px * 10);
  animation: scroll 15s 0.5s linear infinite;
}

.wrapper .logo {
  width: 150px;
}

.wrapper .logo img {
  height: 90px;
}

@keyframes scroll {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(calc(-150px * 5));
  }
}

@media all and (max-width: 720px) {
  .wrapper {
    height: 80px;
  }
  .wrapper .logo {
    width: 120px;
  }

  .wrapper .logo img {
    height: 60px;
  }
}
</style>
