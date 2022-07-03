<template>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="border-bottom">

                    <div class="card-body text-center">
                        <div class="search-form mb-5 search-form--light">
                            <input type="text" class="form-control" placeholder="Search courses" v-model="query" v-debounce="2000" v-on:keyup="SearchBlogs()">
                            <button class="btn" type="button"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Latest Blogs</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card card__course clear-shadow border" v-for="latestBlog in latestBlogs" v-bind:key="latestBlog.id">
                            <div class=" d-flex justify-content-center">
                                <a class="" :href="'/blog/'+latestBlog.id+'/'+latestBlog.slug">
                                    <img :src="'uploadfiles/blogs/banners/'+latestBlog.banner" style="width:100%" alt="Latest Blog">
                                </a>
                            </div>
                            <div class="p-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a class="text-body mb-1" :href="'/blog/'+latestBlog.id+'/'+latestBlog.slug">{{ latestBlog.title }}</a> 
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
               </div>

               <div class="bottom">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Related Blogs</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card card__course clear-shadow border">
                            <div class=" d-flex justify-content-center">
                                <a class="" href="#">
                                    <img src="https://images.unsplash.com/photo-1562577309-4932fdd64cd1?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=clamp&amp;w=800&amp;h=250" style="width:100%" alt="...">
                                </a>
                            </div>
                            <div class="p-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a class="text-body mb-1" href="fixed-#"><strong>Basics of Social Media</strong></a><br>
                                        <div class="d-flex align-items-center">
                                            <span class="text-blue mr-1">
                                                
                                            </span>
                                            <a href="fixed-take-course.html" class="small">Social Media</a>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary ml-auto">$99</a>
                                </div>
                            </div>
                        </div>
 
                    </div>
               </div>

            </div>   
        </div> 
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12" v-if="isLoading">
                    <div class="text-center m-4 pb-5 d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                

                <div class="col-md-6" v-for="blog in blogs" v-bind:key="blog.id" v-else>
                    <div class="card bg-light">
                        <img class="card-img-top" :src="'uploadfiles/blogs/banners/'+blog.banner" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-3">
                                <div v-if="query != ''" v-html="Highlight(blog.title)">
                                </div>
                                <div v-else v-html="blog.title">
                                </div>
                                
                                <a href="#" class="float-right btn btn-sm btn-info d-inline-flex share"><i class="fas fa-share-alt"></i></a>
                            </h5>
                            <div v-if="query != ''">
                                <p class="card-text" v-if="blog.description.length < 70" v-html="Highlight(blog.description)"></p>
                                <p class="card-text" v-else v-html="Highlight(blog.description.substring(0,70)+'...')"></p>
                            </div>
                            
                            <div v-else>
                                <p class="card-text" v-if="blog.description.length < 70" v-html="blog.description"></p>
                                <p class="card-text" v-else v-html="blog.description.substring(0,70)+'...'"></p>
                            </div>
                            

                            <a :href="'/blog/'+blog.id+'/'+blog.slug" class="btn btn-sm btn-info float-right">Read more <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" v-if="isLoading == false && pagination.current_page <= pagination.last_page">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                        <ul class="pagination" v-if="pagination.total > 8">
                            <li v-bind:class="[{ disabled: !pagination.prev_page_url }]" class="page-item"><a class="page-link" href="javascript:;" @click="Blogs(pagination.prev_page_url)">Previous</a></li>

                            <li class="page-item disabled"><a class="page-link" href="javascript:;">{{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                            
                            <li v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item"><a class="page-link" href="javascript:;" @click="Blogs(pagination.next_page_url)">Next</a></li>
                        </ul>
                        <div class="d-flex justify-content-center" v-if="pagination.total == 0">
                            <h5>No courses found for <span style="font-size:30px;" v-html="Highlight(query)"></span></h5>
                        </div>
                    </nav>
                </div>
            </div>
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
            blogs: [],
            latestBlogs: [],
            isLoading: false,
            page: 1,
            pagination: {},
            query: '',
        }
    },

    methods: {
        Blogs(pageUrl) {
            let vm = this;
            this.scrollTop();
            this.isLoading = true;
            pageUrl = pageUrl || '/blogs/json?page='+ this.page;

            Axios.get(pageUrl)
                .then(function (response) { 
                    return response.data; 
                })
                .then(function (response) {
                    vm.blogs = response.data; 
                    vm.makePagination(response);   
                })
                .catch( error => {
                    console.log(error);
                });
        },

        LatestBlogs() {
            let vm = this;

            Axios.get('/latest/blogs/json')
                .then(function (response) { 
                    return response;   
                })
                .then(function (response) {
                    vm.latestBlogs = response.data;
                })
                .catch( error => {
                    console.log(error);
                });
        },

        SearchBlogs() {
            if(this.query !== '') {
                let vm = this;
                this.isLoading = true;

                setTimeout(() =>{
                    Axios.get('/blogs/search/'+this.query)
                        .then(function (response) { 
                            return response.data;   
                        })
                        .then(function (response) {
                            vm.blogs = response.data;
                            vm.makePagination(response);  
                        })
                        .catch( error => {
                            console.log(error);
                        });
                }, 500);
            } else {
                this.Blogs();
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
            return text.replace(new RegExp(this.query, 'gi'), '<span style="color:#de8500;">$&</span>');
        },

        scrollTop() {
            window.scroll(0,0);
        }, 
    },

    created() {
        this.Blogs();
        this.LatestBlogs();
    },

    computed: {
        results() {
            return this.query != '' ? this.blogs.filter(result => result.title.toLowerCase().includes(this.query.toLowerCase())) : [];
        }
    },

}
</script>