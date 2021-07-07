<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Instant Search Component</div>

                    <div class="card-body">

                        <div>
                            <form @submit.prevent="getFormValues">
                                <input type="text" name="search" placeholder="Search" v-model="query">        
                                <ul v-if="results.length > 0 && query">
                                    <li v-for="result in results.slice(0,10)" :key="result.id">
                                        <div @click=selectResult(result)>{{result.first_name}} {{result.last_name}}</div>
                                    </li>
                                </ul>
                                <button type="submit">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Vue from 'vue'
Vue.use(axios)

    export default {

        data() {
            return {
                query: null,
                results: []
            };
        },
        watch: {
            query(after, before) {
                //this.searchMembers();
                this.searchMembersWithDebounce();
            }
        },
        methods: {
            searchMembers: function() {
                axios.get('search', { params: { query: this.query } })
                .then(response => this.results = response.data)
                .catch(error => {});
            },
            searchMembersWithDebounce: _.debounce( function() {
                axios.get('search', { params: { query: this.query } })
                .then(response => {
                    this.results = response.data
                    console.log(this.results)
                    console.log(this.query)
                })
                .catch(error => {});
            }, 500),
            selectResult(result) {
                this.query = `${result.first_name} ${result.last_name}`;
                console.log(this.results)
                console.log(this.query)
            },
            getFormValues(submitEvent) {
                console.log(submitEvent.target.elements.search.value)
            }
        }


    }
</script>
