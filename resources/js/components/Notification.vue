<template>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge">
        {{
        unreadNotifications.length
        }}
      </span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">{{ unreadNotifications.length }} Notifications</span>
      <div class="dropdown-divider"></div>
      <li>
        <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>
      </li>
    </div>
  </li>
</template>

<script>
import NotificationItem from "./NotificationItem.vue";
export default {
  props: ["unreads", "userid"],
  components: { NotificationItem },
  data() {
    return {
      unreadNotifications: this.unreads
    };
  },

  mounted() {
    console.log("Component mounted.");

    Echo.private("App.User." + this.userid).notification(
      notification => {
        console.log(notification);
        let newUnreadNotifications = {
          data: { id: notification.id, data: notification.data }
        };
        console.log("echo working");
        this.unreadNotifications.push(newUnreadNotifications);
      }
    );
    console.log("Component mounted end");
  }
};
</script>
