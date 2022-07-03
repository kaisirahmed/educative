<template>
    <div class="row style-topic justify-content-center">
         <div class="col-xs-12 col-sm-4 col-md-3" v-for="topic in topics" v-bind:key="topic.id" :title="topic.title">
            <div class="image-flip" >
                <div class="mainflip flip-0">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ topic.title }}</h5>
                                <p><img class="img-fluid" :src="'uploadfiles/topics/icons/'+topic.image" alt="topic image"></p>
                            </div>
                        </div>
                    </div>
                    <div class="backside">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ topic.title }}</h5>
                                <p class="card-text" v-if="topic.short_description.length < 50">{{ topic.short_description }}</p>
                                <p class="card-text" v-else>{{ topic.short_description.substring(0,50)+"..." }}</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a :href="'/topic/'+topic.slug+'/courses'" class="btn btn-info btn-rounded btn-sm text-xs-center text-light">
                                            Explore
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <infinite-loading spinner="spiral" @distance="60" @infinite="Topics">
            <div class="pad10" slot="no-more"></div>
        </infinite-loading>
        
    </div>
</template>

<script>
    export default {

        data() {
            return {
                page: 1,
                topics: [],
            }
        },
 
        methods: {
            
            Topics: function($state) {

                let _this = this;

                Axios.get('/topics/json?page='+this.page)
                    .then(response => {
                        return response.data;
                    })
                    .then(response => {

                        $.each(response.data, function(key, value) { 

                            _this.topics.push(value);
 
                        });
                        
                        if (response.data.length > 0) {
                            $state.loaded();
                        } else {
                            $state.complete();
                        } 
                    
                    })
                    .catch(error => {
                        console.log(error);
                    }); 
              
                this.page = this.page + 1;
            },
        },

        created() {
            this.Topics();
        },
    }
</script>
