<template>
	<div class="row style-course justify-content-center">
	 
        <div class="col-xs-12 col-sm-6 col-md-6" v-for="track in tracks" v-bind:key="track.id" @click="TrackCourses(track.slug)" :title="track.title">
            <div class="card">
                <a :href="'/track/'+track.slug+'/courses'"><img class="card-img-top" :src="'/uploadfiles/tracks/banners/' + track.image" alt="Card image cap"></a>
                <div class="card-body row">
                    <div class="col-md-12">
                        <h5 class="bold card-text pb-4 pt-4"><a :href="'/track/'+track.slug+'/courses'">{{ track.title }}</a></h5>
                    </div>
                    <div class="col-md-12 pb-4">
                        <p class="card-text">{{ track.short_description }}</p>
                    </div>
                </div>
            </div>
        </div> 

    	
        <div class="text-center m-4 pb-4">
        
        	<div class="d-flex justify-content-center" v-if="isLoading">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
        	<div v-else>
        		<button type="button" v-show="showMore" class="btn btn-info" @click="LoadTracks()">Show More</button>
        	</div>
        	
    	</div>
    	<!-- </loadmore> -->
    </div>
</template>

<script>
    export default {
        
        data() {
            return {
                tracks: [],
                page: 1,
                showMore: true,
                isLoading: false,
            }
        },
 
        methods: {

        	Tracks() {

        		let _this = this;
        	    
				Axios.get('/tracks/json?page='+this.page)
					.then( response => {
						return response.data;
					})
                    .then( response => {
					  
                    	if (response.current_page <= response.last_page) {
                    		$.each(response.data, function(key, value) { 
                    			if (response.current_page == response.last_page) {
                    				_this.showMore = false;
                    			} else {
                                    _this.showMore = true;
                                }
	                            _this.tracks.push(value);
	                        });
                    	}  
                        _this.isLoading = false;

                    })
                    .catch( error => {
                        console.log(error);
                    });   
                
                this.page = this.page + 1; 
        	},
                
            LoadTracks() {
                this.isLoading = true;
                this.showMore = false;
                setTimeout(() => {
                    this.Tracks();
                }, 1000);
            },
        },

        created() {
            this.Tracks();
        },

    }
</script>

