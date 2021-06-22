<template>
    <div class="container">
        <alertHome></alertHome>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                       <ListHome v-model="dataHome" @click="DataReload"></ListHome>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script src="./js/home.js" type="text/javascript"></script>
