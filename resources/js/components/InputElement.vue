<template>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <div class="form-group">
                <label for="champs">Nom du navire</label>
                <input type="text" name="nom_navire" class="form-control" @>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        // props: ["unreads", "userid"],
        // components: { NotificationItem },
        data() {
            return {
                nom_avire : this.nom_navire
            };
        },
        mounted() {
            console.log('component input-element mounted')
        }
    }
</script>
