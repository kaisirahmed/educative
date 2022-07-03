<template>
	<div class="row style-topic">
        <!-- <div class="row">
            <div class="col-md-12">
                <img class="float-right" src="learningAssets/images/home_topics.png" alt="Topics Cap">
                        <h2 class="bold m-4 text-center p-4">Topics</h2>

            </div>
        </div> -->
        <div class="col-xs-12 col-sm-4 col-md-3" v-for="topic in latestTopics" v-bind:key="topic.id">
            <div class="image-flip" >
                <div class="mainflip flip-0">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ topic.title }}</h4>
                                <p><img class=" img-fluid" :src="'/uploadfiles/topics/icons/'+ topic.image" alt="card image"></p>
                            </div>
                        </div>
                    </div>
                    <div class="backside">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ topic.title }}</h4>
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
    </div>
</template>

<script>
    export default {
        
        data() {
            return {
                latestTopics: [],
            }
        },
 
        methods: {

        	LatestTopics() {

        		let _this = this;

				Axios.get('/latest/topics/json')
					.then(function (response) {
						return response;
					})
					.then(function (response) {
					    _this.latestTopics = response.data;
					})
					.catch( error => {
						console.log(error);
					})
        	},
        },

        created() {
            this.LatestTopics();
        },

    }
</script>