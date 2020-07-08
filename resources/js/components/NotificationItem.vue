<template>

    <a :href="formulaireUrl" class="dropdown-item"  @click="redirect">
                        <i class="fas fa-envelope mr-2"></i> {{unread.data['message']}} par {{unread.data['user_name']}}

        <span class="float-right text-muted text-sm">{{unread.created_at}}</span>
    </a>
</template>
<script>

    export default {
        props:['unread'],
        data(){
            return {
                formulaireUrl:""
            }
        },

        methods: {
            redirect() {
                    // axios.get("http://formulaires/" +this.unread.data['titre'] + "s/"+ this.unread.data['formulaire']);
                this.formulaireUrl= "http://127.0.0.1:8000/formulaires/" + this.unread.data['titre'] + "s/"+ this.unread.data['formulaire']
            }
        },
        // mounted(){
        //     window.location = "formulaires/" + this.unread.data['titre'] + "s/"+ this.unread.data['formulaire'];
        //         // this.unread.data['titre'] + "s/"+ this.unread.data['formulaire']
        //
        //     // this.formulaireUrl= this.unread.data['titre'] + "s/"+ this.unread.data['formulaire']
        // }

    }
</script>
