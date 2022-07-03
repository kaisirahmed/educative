<template>
	<div class="row style-course">
        <div class="col-xs-12 col-sm-4 col-md-3" v-for="course in latestCourses" v-bind:key="course.id">
            <div class="card">
                <img class="card-img-top" :src="'/uploadfiles/courses/banners/'+course.banner" alt="Card image cap">
                <div class="card-body row">
               
                    <div class="col-md-12 border-bottom card-header">
                        <img width="35px" class="course-img-user rounded-circle" src="/learningAssets/images/logo.png" alt="Card image cap">&nbsp;
                        <span class="tutor-name">{{ course.admin.name }}</span>
                        <span class="float-right d-inline-flex course-cost">৳ {{ course.price }}</span>
                    </div>
                    <div class="col-md-12">
                        <p class="card-text pb-4 pt-4">{{ course.title }}</p>
                    </div>
                    <div class="col-md-12 border-bottom mb-4 pb-4">
                        <img class="course-img-level" :src="'/learningAssets/images/' + course.level + '.png'" alt="Card image cap">&nbsp;<span class='course-level'>{{ course.level }}</span>
                        <a :href="'/course/'+course.slug" class="btn btn-light float-right">Preview <i class="material-icons">arrow_forward</i></a>
                    </div>
                    <div class="col-md-12 mb-4">
                        <span class="mr-2">
                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                        </span>
                        <strong>4.7</strong>
                        <small class="text-muted float-right">(391 ratings)</small>
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
                latestCourses: [],
            }
        },
 
        methods: {

        	LatestCourses() {

        		let _this = this;

				Axios.get('/latest/courses/json')
					.then(function (response) {
						return response;
					})
					.then(function (response) {
					    _this.latestCourses = response.data;
					})
					.catch( error => {
						console.log(error);
					})
        	},

            courseView(slug) {
                window.location.href = '/course/'+ slug;
            }
        },

        created() {
            this.LatestCourses();
        },

    }
</script>