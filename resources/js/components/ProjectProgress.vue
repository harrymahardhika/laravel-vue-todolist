<template>
  <div>
    {{ this.completedTaskCount }}/{{ this.taskCount }}
    <span v-if="this.showPercentage">({{ this.percentage }}%)</span>
  </div>
</template>

<script>
  import api from '../api'

  export default {
    name: "ProjectProgress",

    props: {
      projectId: {
        default: null
      },
      showPercentage: {
        default: true
      }
    },

    created() {
      this.getProjectProgress()

      let events
      events = [
        'task-stored',
        'task-deleted',
        'task-completed',
        'task-incomplete'
      ];

      this.$eventHub.$on(events, () => {
        this.getProjectProgress()
      })
    },

    data() {
      return {
        taskCount: 0,
        completedTaskCount: 0,
        progress: 0
      }
    },

    computed: {
      percentage: function() {
        return Math.floor(this.progress * 100)
      }
    },

    methods: {
      getProjectProgress: function() {
        axios.get(api.getProjectProgress(this.projectId))
          .then(response => {
            this.taskCount = response.data.task_count
            this.completedTaskCount = response.data.completed_task_count
            this.progress = response.data.progress
          })
      }
    }
  }
</script>
