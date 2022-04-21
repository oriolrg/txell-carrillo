<template>
    <div class="header-default">
        <div class="container-video" :class="{ 'navbar--hidden': !showNavbar }">
            <iframe width="560" height="100%" src="https://www.youtube.com/embed/oGt88nphB1M?controls=0&showinfo=0&rel=0&autoplay=1&loop=1" title="TxellCarrillo.com" frameborder="0" allow="autoplay; encrypted-media" class="video" allowfullscreen></iframe>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                showNavbar: true,
                lastScrollPosition: 0,
                i : 0
            }
        },
        mounted () {
            window.addEventListener('scroll', this.onScroll)
        },
        beforeDestroy () {
            window.removeEventListener('scroll', this.onScroll)
        },
        methods: {
            onScroll () {
                const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop
                console.log("currentScrollPosition" + Math.abs(currentScrollPosition - this.lastScrollPosition));
                if(this.i==0){
                    if (currentScrollPosition < 0) {
                        return
                    }  // Stop executing this function if the difference between
                    // current scroll position and last scroll position is less than some offset
                    if (Math.abs(currentScrollPosition - this.lastScrollPosition) < 350) {
                        return
                    }
                    this.showNavbar = currentScrollPosition < this.lastScrollPosition
                    document.documentElement.scrollTop = 0;
                    this.i = 1;
                }
                //this.lastScrollPosition = currentScrollPosition
            }
        }
        
    }
</script>
<style>
    .container-video{
        position: relative;
        z-index: 18;
        padding-bottom: 56.25%;
        height: 0;
        pointer-events: none;
    }
    .container-video.navbar--hidden {
        box-shadow: none;
        display: none;
        transform: translate3d(0, -100%, 0);
        height: 60px;
    }
    .header-default{
        min-height: 100px;
    }
</style>
