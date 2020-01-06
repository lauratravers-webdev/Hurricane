/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
var myGiphyAPIKey = 'OtaQGtho3WD9yhs2eyYr1I9cibHLr6ay';

		// Giphy Search and Results Vue component.
		Vue.component( 'giphy-results', {
			data: function () {
				return {
					apptitle: '',
					searchterm: '',
					giphyResults: {},
					isList: false
				}
			},
			methods: {
				giphySearch ()
				{
                    // create a new instance so we don't delete the csrf token for other requests
                let instance = axios.create();

                // delete the x-csrf-token header
                delete instance.defaults.headers.common['X-CSRF-TOKEN'];

                // use the new instance to make your get request
                instance.get( 'https://api.giphy.com/v1/gifs/search?api_key='+myGiphyAPIKey+'&q='+this.searchterm )
                     .then( response => {
                        this.giphyResults = response.data.data;
                     } );
				},

				giphyImage ( images )
				{
					if ( this.isList === true )
					{
						return images.original.url;
					}
					else
					{
						return images.fixed_width.url;
					}
				}
			},
			template: `
				<div id="giphy-results">
					<h1 v-text="apptitle" class="title is-1"></h1>
					<form @submit.prevent="giphySearch">
						<input v-model="searchterm" type="search" class="input" placeholder="Enter a search term.">
						<input type="submit" value="Submit Search" class="input">
					</form>
					<p>Current search term: {{ searchterm }}</p>
                    <form action="/gif" method="get">
					<ul class="columns">
						<li v-for="gif in giphyResults" class="column" v-bind:class="{ 'is-full' : isList, 'is-one-quarter' : !isList }">
							<button type="submit">
								<img v-bind:src="giphyImage(gif.images)" v-bind:alt="gif.slug">
							</button>
						</li>
					</ul>
                    </form>
				</div>
			`
		} );

		// Intiate Vue instance for search container.
		var giphySearch = new Vue( {
			el: '.giphy'
		} );
