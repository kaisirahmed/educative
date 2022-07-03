<template>
<div>
    <div class="d-lg-flex">
        <div class="search-form mb-5 search-form--light">
            <input type="text" class="form-control" placeholder="Search courses" v-model="query" v-debounce="2000" v-on:keyup="SearchSubscriptions()">
            <button class="btn" type="button"><i class="material-icons">search</i></button>
        </div>

    </div>
    
	<div class="row style-course" v-if="query == ''">
        <div class="col-md-4" v-for="subscription in subscriptions" v-bind:key="subscription.id">
            <div class="card">
                <img class="card-img-top" :src="'/uploadfiles/courses/banners/'+subscription.course.banner" alt="Card image cap">
                <div class="card-body row">
               
                    <div class="col-md-12 border-bottom card-header">
                        <img width="35px" class="course-img-user rounded-circle" src="/learningAssets/images/logo.png" alt="Card image cap">&nbsp;
                        <span class="tutor-name"></span>
                        <span class="float-right d-inline-flex course-cost bold">৳ {{ subscription.course.price }}</span>
                    </div>
                    <div class="col-md-12">
                        <p class="card-text pb-4 pt-4">{{ subscription.course.title }}</p>
                    </div>
                    <div class="col-md-12 border-bottom mb-4 pb-4">
                        <img class="course-img-level" :src="'/learningAssets/images/' + subscription.course.level + '.png'" alt="Card image cap">&nbsp;<span class='course-level'>{{ subscription.course.level }}</span>
                        <span class="btn btn-danger float-right" @click="courseView(subscription.course.slug)">Enroll <i class="material-icons">arrow_forward</i></span>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="text-center m-4 pb-5 d-flex justify-content-center" v-if="isLoading && query != ''">
        <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="text-center m-4 pb-5" v-if="query == ''">
    
        <div class="d-flex justify-content-center" v-if="isLoading">
            <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div v-else>
            <button type="button" v-show="showMore" class="btn btn-info" @click="LoadSubscriptions()">More Course</button>
        </div>
        
    </div>

    <nav aria-label="Page navigation example" class="d-flex justify-content-center" v-else>
        <ul class="pagination" v-if="pagination.total != 0">
            <li v-bind:class="[{ disabled: !pagination.prev_page_url }]" class="page-item"><a class="page-link" href="javascript:;" @click="LoadSubscriptions(pagination.prev_page_url)">Previous</a></li>

            <li class="page-item disabled"><a class="page-link" href="javascript:;">{{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            
            <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a class="page-link" href="javascript:;" @click="LoadSubscriptions(pagination.next_page_url)">Next</a></li>
        </ul>
        <div class="d-flex justify-content-center" v-if="pagination.total == 0">
            <h5>No courses found for <span style="font-size:30px;" v-html="Highlight(query)"></span></h5>
        </div>
    </nav>
        <div class="d-flex justify-content-center" v-if="error !== ''">
            <h5 v-text="error"></h5>
        </div>
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
                subscriptions: [],
                page: 1,
                showMore: true,
                isLoading: false,
                query:'',
                pagination: {},
                error: '',
            }
        },
 
        methods: {

        	Subscriptions() {

        		let vm = this;

				Axios.get('/subscriptions/json?page='+this.page)
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
	                            vm.subscriptions.push(value);
	                        });
                        }  
                        vm.isLoading = false;
                    })
					.catch( error => {
						if(error) {
                            vm.isLoading = false;
                            vm.error = error;
                        }
                    });
                
                this.page = this.page + 1; 
            },
                        
            LoadSubscriptions() {
                this.isLoading = true;
                this.showMore = false;
                setTimeout(() => {
                    this.Subscriptions();
                }, 500);
            },

            SearchSubscriptions(pageUrl) {
                this.subscriptions = [];
                this.scrollTop();
                let vm = this;
                this.isLoading = true;
                pageUrl = pageUrl || '/subscriptions/search/'+ this.query;
                
                if(this.query !== '') {
                    setTimeout(() => {
                        Axios.get(pageUrl)
                            .then(function (response) { 
                                return response.data;
                            })
                            .then(function (response) {
                                vm.subscriptions = response.data;
                                vm.makePagination(response);   
                            })
                            .catch( error => {
                                console.log(error);
                            });
                    }, 500);                    
                } else {
                    this.Subscriptions();
                }
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

            courseView(slug) {
                window.location.href = '/course/'+ slug;
            }
        },

        created() {
            this.Subscriptions();
        },
        
        computed: {
            results() {
                return this.query != '' ? this.subscriptions.filter(result => result.title.toLowerCase().includes(this.query.toLowerCase())) : [];
            }
        },

    }
</script>