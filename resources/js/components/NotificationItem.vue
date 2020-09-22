<template>
    <a
        :href="formulaireUrl"
        class="dropdown-item"
        v-on:click="MarkAsRead(unread)"
    >
        <i class="fas fa-envelope mr-2"></i>  {{unread.data["message"]}}

        <span class="float-right text-muted text-sm"
            >par {{ unread.data["user_name"] }}</span
        >
    </a>
</template>
<script>
export default {
    props: ["unread"],
    data() {
        return {
            formulaireUrl: ""
        };
    },

    methods: {
        MarkAsRead: function(notification) {
            var data = {
                id: notification.id
            };
            axios.post("/notification/read", data);
            this.formulaireUrl =
                "http://127.0.0.1:8000/formulaires/" +
                this.unread.data["url"] +
                "/" +
                this.unread.data["formulaire"];
        }
    }
};
</script>
