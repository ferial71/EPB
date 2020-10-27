<template>
    <datetime v-model="datetime" type="datetime" format="DateTime DATE_MED"></datetime>
</template>
<script>
    import 'vue-datetime/dist/vue-datetime.css';
    import { Datetime } from 'vue-datetime';

    // Vue.extend({
    //     // template: '...',
    //
    // });
    export default {
        name: 'dateandtime',
        components: {
            datetime: Datetime
        },
        data() {
            return{
                datetime: ''
            }
        }
        // mounted() {
        //     console.log('component date mounted')
        // }
    };
</script>
