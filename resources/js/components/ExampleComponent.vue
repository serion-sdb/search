<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div>I'm an example component.</div>
                        </br>
                        <div>Count = {{ $root.count }}</div>
                        <div>Increment = {{ $root.increment }}</div>
                        </br>
                        <div>
                            <button @click="addCount()">Add Count</button>
                            <button @click="addIncrement()">Add Increment</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

        },
        methods: {
            addCount() {
                this.$root.count++
            },
            addIncrement() {
                this.$root.increment++

            },
        },
    }
</script>
