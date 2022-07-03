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
		// window.debounce is our global function what we defined at the very top!
		el.oninput = debounce(ev => {
			el.dispatchEvent(new Event('change'));
		}, parseInt(binding.value) || 300);
	}
});

if(document.getElementById("courseLesson")){
const app = new Vue({

    el: '#courseLesson',

    data() {
        return {
          lessonList: '',
          isLoading: false,
          color: '',
          keywords:'',
          searchLessonList: ''
        }
    },

    methods: {

        LessonListDetail: function(location) {
 
            this.scrollTop();
            this.isLoading = true;
            
            setTimeout(() => {
                this.CourseLessonsDetails(location);
            }, 500);
        },

        CourseLessonsDetails: function(location) {
          
            this.isLoading = true;
            let vm = this;

            Axios.get(location)
                .then(function (response) {
                    return response;
                })
                .then(response => {
                    
                    window.history.pushState(response.data, '', location);

                    vm.lessonList = response.data;

                    if(response.data.preview === 1){
                        this.color = 'black';
                    }
                    
                })
                .catch( error => {
                    console.log(error);
                })
            
            this.isLoading = false;
            
        },

        scrollTop() {
            window.scroll(0,0);
        }, 

        CourseLessonList(location) {
          
            let vm = this;
            window.onpopstate = function(event) {
                
                Axios.get(location)
                    .then(function (response) {
                        return response;
                    })
                    .then(response => {
                        
                        vm.scrollTop();
                        vm.lessonList = response.data;

                        if(response.data.preview === 1){
                            this.color = 'black';
                        }
                        
                    })
                    .catch( error => {
                        console.log(error);
                    })
            
                this.isLoading = false;
            }
        },

        SearchLessonList: function(courseId) {
            let vm = this;
            Axios.get('/search/lessons/lists/'+courseId)
                .then(function (response) {
                    return response;
                })
                .then(response => {
                    vm.searchLessonList = response.data;
                })
                .catch( error => {
                    console.log(error);
                })
        },

        Highlight(text) {
			return text.replace(new RegExp(this.keywords, 'gi'), '<span style="color:red;">$&</span>');
		}
                  
    },

    created() {
        this.CourseLessonList(document.location);
    },

    computed: {
		results() {
			return this.keywords ? this.searchLessonList.filter(result => result.title.toLowerCase().includes(this.keywords.toLowerCase())) : [];
		}
	},
     
});
}