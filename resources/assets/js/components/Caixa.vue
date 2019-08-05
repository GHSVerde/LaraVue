<template>
    <div class="small-box bg-info" v-bind:style="defineBg">
        <div class="inner">
            <h3>{{ qtd }}</h3>

            <p>{{ titulo }}</p>
        </div>
        <div class="icon">
            <i v-bind:class="icone"></i>
        </div>
        <a v-bind:href="url" class="small-box-footer">
            Ver Mais <i class="ion ion-android-arrow-forward"></i>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['qtd', 'titulo', 'url', 'cor', 'icone'],
        computed:  {
            defineBg: function () {
                return 'background-color: ' + this.cor + '!important;';
            }
        }

    }
</script>

<style scoped>
.small-box {
    margin-bottom: 1rem!important;
    border-radius: .25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
    color: #fff;
}
    .bg-info, .bg-info > a, .alert-info, .alert-info > a {
        color: #fff!important;
    }
    .bg-info {
        background-color: #17a2b8!important;
    }
.small-box>.inner {
    padding: 10px;
}
.small-box h3, .small-box p {
    z-index: 5;
}
.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    padding: 0;
    white-space: nowrap;
}
.small-box p {
    font-size: 15px;
    margin-top: 0;
    margin-bottom: 1rem;
}
.small-box .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
}
.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.glyphicon, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    transition: all .3s linear;
}
.small-box>.small-box-footer {
    background: rgba(0,0,0,.1);
    color: rgba(255,255,255,.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
    transition: all .3s linear;
}

.small-box:hover .icon>i.fa, .small-box:hover .icon>i.fab, .small-box:hover .icon>i.far, .small-box:hover .icon>i.fas, .small-box:hover .icon>i.glyphicon, .small-box:hover .icon>i.ion {
    font-size: 75px;
}
.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.glyphicon, .small-box .icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box>.small-box-footer:hover {
    background: rgba(0,0,0,.15);
    color: #fff;
}

</style>