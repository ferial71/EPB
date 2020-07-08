<template>
<!--    @click="markNotificationAsRead"-->
    <li class="nav-item dropdown" >
        <a class="nav-link" data-toggle="dropdown" >
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{unreadNotifications.length}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >

            <span class="dropdown-item dropdown-header">{{unreadNotifications.length}} Notifications</span>

            <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>



            <div class="dropdown-divider"></div>


            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>
</template>

<script>
    import NotificationItem from './NotificationItem.vue';
    export default {
        props:['unreads','userid'],
        components: {NotificationItem},
        data(){
            return {
                unreadNotifications: this.unreads
            }
        },
        methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/markAsRead');
                }
            }
        },
        mounted() {
            console.log('Component mounted');
            // Echo.private(`App.User.${this.userid}`)
            //     .notification((notification) => {
            //         console.log(notification.type);
            //         let newUnreadNotifications = {data: {thread: notification.thread, user: notification.user}};
            //         this.unreadNotifications.push(newUnreadNotifications);
            //     });

            // let userId= "{{ Auth::id() }}";

            Echo.private('users.' + this.userid)
                .notification((notification) => {
                    console.log(notification.type);
                    let newUnreadNotifications = {data: {thread: notification.thread, user: notification.user}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
