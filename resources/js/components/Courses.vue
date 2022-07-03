<template>
<div>
    <div class="d-lg-flex">
        <div class="search-form mb-5 search-form--light">
            <input type="text" class="form-control" placeholder="Search courses" v-model="query" v-debounce="2000" v-on:keyup="SearchCourses()">
            <button class="btn" type="button"><i class="material-icons">search</i></button>
        </div>

        <div class="form-inline mb-5 ml-auto">
            
            <div class="form-group">
                <label for="filter" class="form-label mr-1">Filter</label>
                <select v-model="filter" @change="FilterCourse()" class="form-control">
                    <option value="all" selected>All</option>
                    <option value="free">Free Courses</option>
                    <option value="paid">Paid Courses</option>
                </select>
            </div>
        </div>
    </div>
    
	<div class="row style-course" v-if="(query == '') && (filter == '')">
        <div class="col-md-4" v-for="course in courses" v-bind:key="course.id">
            <div class="card">
                <img class="card-img-top" :src="'/uploadfiles/courses/banners/'+course.banner" alt="Card image cap">
                <div class="card-body row">
               
                    <div class="col-md-12 border-bottom card-header">
                        <img width="35px" class="course-img-user rounded-circle" src="/learningAssets/images/logo.png" alt="Card image cap">&nbsp;
                        <span class="tutor-name">{{ course.admin.name }}</span>
                        <span class="float-right d-inline-flex course-cost bold">৳ {{ course.price }}</span>
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
    
    <div class="row style-course" v-else>
        <div class="col-md-4" v-for="course in searchCourses" v-bind:key="course.id">
            <div class="card">
                <img class="card-img-top" :src="'/uploadfiles/courses/banners/'+course.banner" alt="Card image cap">
                <div class="card-body row">
                    
                    <div class="col-md-12 border-bottom card-header">
                        <img width="35px" class="course-img-user rounded-circle" src="/learningAssets/images/logo.png" alt="Card image cap">&nbsp;
                        <span class="tutor-name">{{ course.admin.name }}</span>
                        <span class="float-right d-inline-flex course-cost bold">৳ {{ course.price }}</span>
                    </div>
                    <div class="col-md-12">
                        <p class="card-text pb-4 pt-4" v-html="Highlight(course.title)"></p>
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

    <div class="text-center m-4 pb-5 d-flex justify-content-center" v-if="isLoading && ((query != '') || (filter != ''))">
        <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="text-center m-4 pb-5" v-if="(query == '') && (filter == '')">
    
        <div class="d-flex justify-content-center" v-if="isLoading">
            <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div v-else>
            <button type="button" v-show="showMore" class="btn btn-info" @click="LoadCourses()">More Course</button>
        </div>
        
    </div>

    <nav aria-label="Page navigation example" class="d-flex justify-content-center" v-else>
        <ul class="pagination" v-if="pagination.total != 0">
            <li v-bind:class="[{ disabled: !pagination.prev_page_url }]" class="page-item"><a class="page-link" href="javascript:;" @click="SearchCourses(pagination.prev_page_url)">Previous</a></li>

            <li class="page-item disabled"><a class="page-link" href="javascript:;">{{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            
            <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a class="page-link" href="javascript:;" @click="SearchCourses(pagination.next_page_url)">Next</a></li>
        </ul>
        <div class="d-flex justify-content-center" v-if="pagination.total == 0">
            <h5>No courses found for <span style="font-size:30px;" v-html="Highlight(query)"></span></h5>
        </div>
    </nav>
    
    </div>
</template>

<script>

    function debounce(fn, delay = 300) {
        var timeoutID = null;

        return function () {
            clearTimeout(timeoutID);

            var args = arguments;
            var that = this;

            timeoutID = setTimeout(function () {
                fn.apply(that, args);
            }, delay);
        }
    };

    // this is where we integrate the v-debounce directive!
    // We can add it globally (like now) or locally!
    Vue.directive('debounce', (el, binding) => {
        if (binding.value !== binding.oldValue) {
            el.oninput = debounce(ev => {
                el.dispatchEvent(new Event('change'));
            }, parseInt(binding.value) || 300);
        }
    });

    export default {
        
        data() {
            return {
                courses: [],
                page: 1,
                showMore: true,
                isLoading: false,
                query:'',
                searchCourses: [],
                pagination: {},
                filter: '',
            }
        },
 
        methods: {

        	Courses() {

        		let vm = this;

				Axios.get('/courses/json?page='+this.page)
					.then(function (response) { 
					    return response.data;
                    })
                    .then(function (response) {
                        if (response.current_page <= response.last_page) {
                    		$.each(response.data, function(key, value) { 
                    			if (response.current_page == response.last_page) {
                    				vm.showMore = false;
                    			} else {
                                    vm.showMore = true;
                                }
	                            vm.courses.push(value);
	                        });
                        }  
                        vm.isLoading = false;
                    })
					.catch( error => {
						console.log(error);
                    });
                
                this.page = this.page + 1; 
            },
                        
            LoadCourses() {
                this.isLoading = true;
                this.showMore = false;
                setTimeout(() => {
                    this.Courses();
                }, 500);
            },

            SearchCourses(pageUrl) {
                this.searchCourses = [];
                this.scrollTop();
                let vm = this;
                this.isLoading = true;
                pageUrl = pageUrl || '/courses/search/'+ this.query;
                
                if(this.query !== '') {
                    setTimeout(() => {
                        Axios.get(pageUrl)
                            .then(function (response) { 
                                return response.data;
                            })
                            .then(function (response) {
                                vm.searchCourses = response.data;
                                vm.makePagination(response);   
                            })
                            .catch( error => {
                                console.log(error);
                            });
                    }, 500);                    
                } else if(this.filter !== '') {
                    this.FilterCourse();
                } else {
                    this.Courses();
                }
            },

            FilterCourse: function() {
                let vm = this;
                this.searchCourses = [];
                this.isLoading = true;

                setTimeout(() => {
                    Axios.get('/courses/filter/'+this.filter)
                        .then(function (response) { 
                            return response.data;
                        })
                        .then(function (response) {
                            vm.searchCourses = response.data;
                            vm.makePagination(response);   
                        })
                        .catch( error => {  
                            console.log(error);
                        });
                }, 100);       
            },
            
            makePagination(response) {
                let pagination = {
                    current_page: response.current_page,
                    last_page: response.last_page,
                    next_page_url: response.next_page_url,
                    prev_page_url: response.prev_page_url,
                    total: response.total
                }
                
                this.isLoading = false;
                this.pagination = pagination;
            },
            
            Highlight(text) {
                return text.replace(new RegExp(this.query, 'gi'), '<span style="color:#00bfae;">$&</span>');
            },

            scrollTop() {
                window.scroll(0,500);
            }, 
        },

        created() {
            this.Courses();
        },
        
        computed: {
            results() {
                return this.query != '' ? this.searchCourses.filter(result => result.title.toLowerCase().includes(this.query.toLowerCase())) : [];
            }
        },

    }
</script>